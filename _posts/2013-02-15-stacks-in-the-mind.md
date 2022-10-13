---
tag: programming
---
You’re mind is like a computer in the sense that we have [limited cognitive resources](http://businessofsoftware.org/2013/02/kathy-sierra-building-the-minimum-badass-user-business-of-software-a-masterclass-in-thinking-about-software-product-development/) available. In order to optimize the way we operate the best course of action is to try to reduce wasting that load on unimportant tasks and move it to something useful. As a programmer we know ways to reduce work from algorithms class. We even have notation. Can we apply what we do in the programming world to our own minds?

The example I can think of is the process of debugging. More specifically, learning new code, because as we all know after mastering it we no longer need a debugger. In order to learn where code is we must learn where each file in the repository is, which other files it references and generally which functions are used where. To learn this we follow the execution path when testing new changes or fixing bugs.

In this context, our mind could be thought of as a stack based computer. Each function we enter, our mind has to remember the details of where we came from, like creating a mental stack frame. We then push those details temporarily aside to learn the new function. When we hit the deepest point we can in the code without finding the problem, we come back up and continue on, remembering the path on the way. This continues until the problem is found.

This then begs the question, “How do we structure our functions?” This is a double edged sword. Many experienced programmers will want very flat call graphs with large functions. This puts all the code in front of them and they have little depth to remember. However this is a nightmare for a novice because the wall of text is intimidating and there’s no way to know what’s doing what at first.

So a novice blocks everything off into functions, even when only used once. They create confusing, unnecessary and deep class hierarchies to try to make sense of the code, or make it more like what they learned in school. However, this will cause a mental stack overflow for the expert because he just wants to find the kerning function and it’s buried in the SmallFont class, which is derived from an abstract Font class and implements an IKernable interface. At least he thinks it’s a SmallFont, maybe it’s a BoldFont. He’ll have to check the XML. Sorry bit of a pet peeve.

Anywho… Both scenarios are inefficient for different reasons. If you want to reduce cognitive load you need to strike a balance between depth and breadth. Having everything in one giant main function would be absolute madness, and so would a more extreme version of our kerning example.

Make functions with sensible names when you see code that’s used multiple times. Make classes when you see functionality used multiple times. Use inheritance and interfaces when you see classes performing similar functionality multiple times, etc. Simplified, reuse code only when you have to, but no less. Refactor constantly.

On the subject of sensible names, for the love of god use sensible names. They makes usage easier to recall and the code easier to work with. This includes not abusing namespaces. Speaking of which, this stack analogy can be extended to the arrangement of files in your codebase. Make it match your namespace and class hierarchy and have one that is as deep as necessary and no deeper.

In this vein, keep paths consistent, if you see the same folder name show up multiple times in a path, someone screwed up. Things need to have a specific place to be that you can always turn to. Multiple docs folders instead of one central wiki, or Shared/GUI/Screens/Shared type folders can go jump off a cliff. Less decision making and thought free up resources and these set ups do nothing but drain the brain.

Old code doesn’t suck because it was written poorly in a rush, it sucks because we aren’t allowed time to adjust to it.