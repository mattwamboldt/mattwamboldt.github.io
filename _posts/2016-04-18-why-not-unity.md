---
title: "Why Not Unity?"
tags: game-dev programming
---
At some point every developer has to make this decision: Write my own engine or use Unity/UE4/Insert Favourite Engine Here. The decision always depends on your past experience.

When starting out, many people try to write their own engine and get buried in the sheer volume of new information and problems to solve. When experienced, many try to use an existing engine and get frustrated at the lack of control and performance. The further along in your career you get the more it makes sense to use your own technology.

This is mainly due to the Law of Leaky Abstractions. Every layer that separates you from the code that does the actual work, the more cases where it will run slowly or incorrectly. When prototyping these issues don’t matter much. You also aren’t likely to run into them if your game is very generic and fits well in that engine.

As you get more experience working with different engines, or for companies that write their own, you’ll learn one major truth. Closed source is the enemy of game development. Not being able to debug the internals of a system, or fix places where the abstraction has leaked, will paralyze your game. It’ll always happen at the worst possible time, usually beta or finaling, and you’ll hate whoever wrote the tech you’re using.

So what does this all mean? Prototype in your favourite engine, your own if you’ve got one, then port to something you can change at all levels. I’d recommend prototyping in Unity for 3d and GameMaker for 2d since they’re well liked and have good communities. The next question is how to move past that, which is the realm of a thousand books I’ve yet to finish reading.

In general your own engine shouldn’t be an engine, but a collection of libraries and tools. Some of those should be pre-existing and some of those will be from scratch. The best approach I’ve found is to start with as much preexisting as you can to get your game running, then swap out parts as you go along.

This process of stripping away layers, building subsystems and learning more about why they exist will ultimately make you a better programmer. It’ll also make you appreciate what the big name engines can do and when they may be the better option.

Making your own engine and tools is a necessary aspect of the growth of a game programmer, but don’t take it on lightly.