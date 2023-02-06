---
title: Synthesizer
description: This began as an attempt to learn about audio programming and is slowly transforming into a full audio system, with midi, recording, and effects.
githubUrl: https://github.com/mattwamboldt/synthesizer
downloadUrl: https://github.com/mattwamboldt/synthesizer/releases
thumbnail: /assets/images/projects/synthesizer-thumbnail.jpg
backdrop: /assets/images/projects/synthesizer-backdrop.jpg
startDate: 2015-04-04
date: 2016-03-24
---
This began as an attempt to learn about audio programming and is slowly transforming into a full audio system, with midi, recording, and effects. Much of the lower level synthesis code is based on The Audio Programming Book, by Richard Boulanger and Victor Lazzarini.  It’s written in C++ on top of the SDL, which means I can ignore things like ASIO and ALSA. The current build shows a blank screen and turns any key presses into midi signals for playing notes.

## Capabilities

There are some hidden capabilities in the codebase that were developed and tested but aren’t shown in the app. Eventually I’ll make a UI to select and demo them, but for now they’ll be listed here.

**Pure Oscillators:** Uses functions to generate the basic wave shapes; sine, square, triangle, and saw.

**Wavetable Synthesis:** Contains a pregenerated wave that’s played back at rates to sound like different frequencies. It saves memory and allows you to use any sound for synthesis.

**Reading and Recording to Wave files:** Valuable for testing other parts of the system.

**Breakpoint Files:** A file format for changes in values. Attack Delay Sustain Release (ADSR) envelopes are a common usage. They can also define frequency sweeps, and other cool effects.

**Effects:** Applied to a generated sound buffer after the fact. Currently it only supports Tremolo, which is using an oscillator to “wobble” the amplitude of a sound, and Delay, which is a basic echo.

**MIDI:** The app demos a small subset of MIDI. It’s missing many command signals and the set of base instruments. Needs a healthy overhaul to be more useful and complete.