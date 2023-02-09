---
title: ROMulus (NES Emulator)
description: An Emulator for old consoles built as low level as possible, without third party libraries. Started with the NES and more consoles to come.
githubUrl: https://github.com/mattwamboldt/romulus
downloadUrl: https://github.com/mattwamboldt/romulus/releases
image: /assets/images/projects/romulus-thumbnail.png
backdrop: /assets/images/projects/romulus-backdrop.png
preview: /assets/images/projects/romulus-preview.mp4
startDate: 2020-05-07
lastRelease: 2022-12-20
date: 2022-12-20
---

ROMulus is an emulator for old video game consoles. The first one it supports is the NES, but I've
come to really enjoy this kind of thing so I'll probably keep going. An emulator is software that tries
to act like an existing piece of hardware. It doesn't have to do it the same way as the hardware as
long as it's functionally "close enough", which is what separates it from a simulator.

I should mention that all of the ROMs I used during development were made specifically for testing
by the community or are games that I already own a copy of. Don't steal. This emulator is actually missing
several mappers and mapper variants because I don't have games to test with and I'm fine with that.

## Why do this?
For several years I've been dancing around low level programming, with courses like [Nand to Tetris](https://www.nand2tetris.org/){:target="_blank"},
and following series like [HandMade Hero](https://handmadehero.org/){:target="_blank"}. Ben Eater has some great stuff
as well on [building an 8 bit computer](https://www.youtube.com/playlist?list=PLowKtXNTBypGqImE405J2565dvjafglHU){:target="_blank"}
out of logic gates and basic chips. It's a skillset that has enhanced my understanding of how all
levels of the stack work. Knowing how the machine works takes a lot of the magic and abstraction away.

Then I saw the start of this series on building an [NES emulator](https://www.youtube.com/watch?v=F8kx56OZQhg){:target="_blank"}
by javidx9. For some reason I decided to build one first and not watch it until I was done. Solving
the puzzle is most of the fun for learning/side projects, so watching his solution was a "spoiler"
in my mind. I had also done some other projects (Not posted as of writing this) that didn't use third
party libraries like SDL, so I decided to stick with that approach.

## How Does it Work?
Describing how this thing works would take an entire book. There are countless wiki articles, ancient
forum threads, reddit posts, technical spec sheets, wiring diagrams, and more. I tried listing the
prerequisite electrical and software engineering concepts you'd need to undertake this and it was a
whole series in itself.

The most messed up part is that it all makes perfect sense to me. Like boiling a frog, the change
was so gradual I didn't even realize it had happened until it was already over. All of that colorful
language to say this will not be a full breakdown. You're getting the
[short short version](https://www.youtube.com/watch?v=5X4HYA-lB-U){:target="_blank"} and I'll go into
more detail in other posts later.

### Load the ROM
When writing one of these you could interchange this step with writing the CPU but I think getting
something to run the CPU against is more vital. Plus if you can't handle loading a binary file into
an array, the bit twiddling required for the CPU instructions will be SO much worse. Easier to start
here I think.

NES roms are usually in [iNES format](https://www.nesdev.org/wiki/INES){:target="_blank"}. Open the file, read what
you need out of the header, and copy the rest into specific arrays, or one big array with separate
pointers that you'll math away later. The CPU has 64KB of addressable space. Some addresses in that
range are mapped to different parts of the system and different parts of the cartridge, and that's
all initialized when you load the rom. Thats where the term mapper comes from.

ROMulus supports a few configurations of iNES header and most of the first 10 mappers. It also supports
NSF which is a format for playing back music using the emulated APU. Building an NSF player is a good
step after the CPU is working since it explicitly needs the PPU to be missing/turned off.

### Write the CPU
On reset and power up the CPU reads the two bytes at address 0xFFFC and 0xFFFD, and that makes up the
address of the first instruction. It then reads from memory, one byte at a time, and follows the instructions
it finds. Emulating the CPU means understanding what each instruction means, including the operation
to perform, how to get the parameters, and what to do with the result.

Also timing, but no time for that... Jokes aside this emulator is cycle accurate. That means if an instruction
takes 7 cycles to run, it will do the specific memory reads/writes and other actions that would happen
on each cycle. You can ignore this at first but it'll become vital when graphics come into play.

Logging the assembly language equivalent of the current instruction and comparing that to a known good
log is a great way to get started. Once you can read an instruction well enough to print it out, you'll
have all the information you need to run it. The [nestest log](https://github.com/mattwamboldt/romulus/blob/master/test/nestest/nestest.log){:target="_blank"}
is the gold standard for when you're early in cpu development.

The first version of this emulator was actually a console application. It had a debugger that would single
step instructions based on key press, write out the state of the CPU registers and the next instruction
disassembly, and had a paged memory viewer. This was great for getting running, but fell apart the second
I started on the graphics. The windows console just isn't fast enough.

### Generating Graphics
There's a bit more detail in the NES Internals section, but as to how it works generally, we simulate
PPU cycles and CPU cycles a certain amount of times per frame, based on the app's framerate. Every tick
of the PPU it's outputting the current color into an array, called a back buffer, and advancing its state.

Meanwhile the app is showing the previous completed frame, the front buffer. When the PPU hits the end
of the frame and enters vblank, the pointers to the front and back buffer are swapped. The details of
how the PPU renders a given pixel are WAY MORE than I can get into here. The PPU is the single most
complex part of the system to get right.

### Generating Audio
Based on the sample rate, the outputs of all the APU channels are gathered, mixed, and put into a
buffer to be grabbed by DirectSound later. The APU channels have several components, such as the timers,
that advance independantly of the CPU. The CPU can only turn channels on and off, and adjust their
parameters through memory mapped registers.

The APU circuitry can also trigger interrupts on the CPU and invoke DMA requests, but that's getting
into more complicated territory.

### Controller Support
Controller inputs are read using XInput, which is built into windows to allow games to have a common
interface for Xbox 360 and compatible controllers. There's also a keyboard controller configuration,
and both map to a common NES controller structure. The mouse can be used for Zapper compatible games.

These values are updated every frame and queried by the CPU through the mapper at specific addresses.

### Win32 components
There's too much to go into but I do want to shout out that there are some very cool things that you
can learn by doing straight win32 programming. For instance other frameworks like WinForms are just
extended class based wrappers around win32 concepts. There are also things like accellerators, menu
bars, dialogs, resource files, and effects you can achieve with window styles, that were all fun to
learn about.

## NES Internals
High level overview of the internals of an NES. I'm gonna skip a ton, oversimplify and half of the
terms won't make sense without other knowledge so... sorry?

### CPU
The NES uses a modified version of the MOS6502 cpu, a chip that was used in a lot of computers at the
time. They basically wrapped that chip in a package that also had the audio chips, a DMA controler,
and some hardwiring of the memory space to things like the controllers and the PPU. So even though
there's reference to an APU, it kinda doesn't exist except conceptually since it's all part of the CPU.

### APU
The APU consists of hardware to drive 5 channels of output, which are then mixed together and pass
through some filters to go out to the speakers. These consist of the following channels:
- **Pulse (x 2):** Square waves that use pulse width modulation. Used for most general sounds.
- **Triangle:** Less harsh than the pulse channels. Used for bass lines or wind instruments.
- **Noise:** Random noise generator. Sounds a bit like static and often used for percussion.
- **DMC:** Outputs delta encoded samples from memory. Used most notably for voice clips.

### PPU
The graphics on an NES are generated by the Picture Processing Unit (PPU). VERY broadly speaking the
PPU renders two things: background tiles and sprites. Sprites are made up of a collection of tiles at
a specific position.

All of the tiles are rendered from an area of memory called the pattern table, which is then combined
with a specific pallette to output the right set of colors for that tile in that location. Backgrounds
use nametable memory for layout which can be controlled and expanded on by the cartridge. Sprites use
OAM ram, which is on the PPU itself and limited to 64 sprites.

Unlike the CPU, the PPU is a hardwired chip and runs through a preset "script" in a sense, based on which
dot (x position) and which scanline (y position) it's on. This means that any game code that has to alter
graphics must be done in a specific window of time or be meticulously planned to run at exact points
in the process.

### Memory
The CPU has 64KB of address space, but that's actually partitioned to [different physical connections](https://www.nesdev.org/wiki/CPU_memory_map){:target="_blank"}
and several parts are mirrored, as in they map to the same physical space. The PPU has a separate 16KB
of address space which is similarly [mapped to different chips](https://www.nesdev.org/wiki/PPU_memory_map){:target="_blank"}
and some parts are mirrored.

The NES has 2KB of onboard RAM for the CPU and 2KB of VRAM for the PPU. The PPU internally has 256
bytes for sprite data, [called OAM, or Object Attribute Memory](https://www.nesdev.org/wiki/PPU_OAM){:target="_blank"},
along with 28 bytes to store [pallettes.](https://www.nesdev.org/wiki/PPU_palettes){:target="_blank"}

All of the remaining address space is mapped between the CPU, PPU, APU, controllers, and the cartridge.
Every game cartridge can have various hardware with more or less capacity than other games depending
on the budget of the game and what effects the developers were trying to achieve. This is what [mappers](https://www.nesdev.org/wiki/Mapper){:target="_blank"}
are for.

For example [NROM](https://www.nesdev.org/wiki/NROM){:target="_blank"} which is mapper 0, was a set of cartridge boards
that have a fixed mapping. The CPU addresses above 0x8000 always go the same place on the cart. It's used
in several early games like Donkey Kong, which is the first game to get working if you have it. Mostly
because it's mapper is so simple and it doesn't have a moving camera.

On the other end of the spectrum you have something like [MMC3](https://www.nesdev.org/wiki/MMC3){:target="_blank"}
which had 512KB of CPU accessible memory alone, more than the CPU can address. So it has internal logic
that lets you swap what parts of the address space map to what parts of the ROM. The PPU has a separate
set with it's own logic to swap what maps to what. Plus it has it's own interrupt mechanism for counting
scanlines based on PPU accesses, it's a whole thing.

## Conclusion
This project was a ton of fun and I know this is only the beginning. It's important that we keep this
kind of low level knowledge alive. Even though I've spent the last 7+ years doing web dev, it's valuable
to understand how computers actually work to keep things in perspective and to know what's possible.
