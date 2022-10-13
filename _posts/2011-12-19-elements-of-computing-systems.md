---
title: "Elements of Computing Systems"
tag: programming
---
[Elements of Computing Systems](http://www1.idc.ac.il/tecs/) is a course developed by two professors that felt computer science students weren't being given a practical understanding of how computers work as a whole. Many topics in this course tend to be glossed over in the current university and college curricula. Having been through college, I can fairly say we were taught practically none of this material. I decided to take this on in my down time, and can say that it's fascinating. It fills in many gaps that I had in understanding the ultimately simple construction of these systems.

## Hardware Portion
The book is structured in a bottom up style and the student builds everything themselves using simulators and test scripts. It begins by saying that the “not and” gate (Nand) and data flip flop (DFF) are built into the simulator. You then construct everything from those. First building other logic gates, then multiplexers and de-multiplexers, memory systems, ALU, CPU, and finally a whole simulated computer.

There's an immense amount of pride, and ultimately curiosity, that comes from making something real. It was extremely tempting to unravel everything down to basic logic and build it in Minecraft, but I didn't. Again, I didn't know what some of this stuff was, and certainly not how any of it worked in a practical sense. Hardware is logically not as complex as we make it out to be in our minds though. This only took a few nights and was the shortest thing to implement.

## Software Transition
Next you build an assembler for this simple computer. In case you don't know, an assembler takes assembly language that humans can read and translates it into binary that the machine can understand. Another exciting experience to see how instruction encoding works, and how to do some basic parsing. I used Perl for this, because it's good at manipulating text. This took a few days as well.

Then the only lull for me in the course comes; the virtual machine. A virtual machine is a conceptual computer, a layer between the programming language and the specific hardware you're running on. Think .Net, though I know the course wants you to think of Java. What they get you to build is a translator from the virtual machine code, into the assembly that was used in the last chapter.

Though it felt like a bit of an extraneous step, it was useful. From implementing the virtual machine I learned how the stack works, how function calling works, and how branch instructions can turn into goto's with unique labels. All valuable and having it in this form means it doesn't get in the way of learning about compilation. These are all things I knew theoretically, but now have a much deeper understanding of.

## The Rest (Software portion)
I'm close to done this course, and am about to do what is likely the other exciting phase; compilation. The rest of the course focuses on this compiler followed by writing a small operating system/standard library for the language. At that point I'll likely go study some of the topics of this course in more detail.

I would thoroughly recommend this to anyone with even a basic programming course under their belt and a desire to learn more about how computers work. Even having not finished yet, I know I will soon and can't wait to keep learning.