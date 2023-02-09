---
title: "A Perspective on UI in Game Engines"
tag: programming
excerpt: How I think about the architecture of UI systems for games and why so many get it wrong.
image: /assets/images/blog/ui-in-game-engines.jpg
---
*Note: Wrote this about five years ago but still agree with the general conclusion.*

## Indicators, UI and the World
In doing a lot of thinking about the failings of modern UI systems I’ve struck upon a new way to think about the architecture of these things. I’m sure there’s probably some existing notion of this but I’ve never run into it in the books and articles I’ve read when making games. Basically there are 3 types of visual display element we have to deal with, three layout methods.

First is the world itself. When we look at the world we are looking through a particular camera. This could be our eyes or a screen. The world is a static entity outside of our point of view. Put another way the world doesn’t change because our eyes move, we just changed our point of view, our perspective on the world.

For a game this means that we treat the world as a thing which is laid out on it’s own terms, with it’s own positioning and math. We then create a camera that is in a certain place and orientation in the world to take a picture of it.

Second are Indicators. Indicators are sometimes called HUD elements but that can be a confusing term. Indicators are attached to objects in the World, but move in relation to the camera, so they are always facing or visible in the cameras view. They are an in between that isn’t fully in the world and isn’t fully in the camera. In games these are usually tracked and handled in a one off system that is tied to the world and uses the position of the camera to position itself.

The final perspective is the UI or the camera itself. The camera can have objects on it that move relative to it alone. Imagine a window with post it notes on it. If you close the curtains it will shrink the viewable area of the window. You still want to see the post it notes so you need to move them in so you can still see them. That doesn’t happen to anything in the world beyond the window.

In games the solution to this is another system that can handle changing the layout of where things are relative to the screen size. I think failing to understand the fundamental distinctions and similarities between these layout methods is what causes the failure of many UI systems to fit the full needs of game development.

Addressing the distinction means we need a way to layout objects relative to the screen, which would be something markup languages are good for. Many UI systems based on html do quite well, yet at times are bloated and disconnected from the other systems of the game engine. They feel tacked on, and are loaded with standards for web that don’t apply to a game environment. They don’t handle the dynamic nature of a games visual presentation, since they are meant for static pages.

On the other end you have systems like scaleform and gameswf, which are excellent tools to enpower artists to create beautiful dynamic interfaces, but suffer a worse disconnect of resource usage and engine architecture. They give you the best look you can ask for and still leave you wanting when it comes to implementation.

There are also widget libraries like qt or wxwidgets, which give you very standard tools for ui. So standard and prescribed that they don’t fit with the one off custom nature of game UI. Bending these systems to fit your use case can be very cumbersome.

## What’s the solution?

Sadly the best solution is to create a system that fits with your architecture. The only difference between UI and your world is positioning of objects, layout. That makes it sound so simple and in truth it is that simple, which is why these other solutions don’t work well. They are trying to solve a very different and complex set of broad problems, and what you have is a very simple and specific problem. How to position objects relative to screen dimensions instead of relative to a world space.

If you can find a layout engine that does only that and still lets you use your object representation, than use that. You want your UI objects to have the same event handling, the same callback mechanisms, the same scripting language as the rest of your game. All the while keeping in mind that the layout method being different means it is still a different system from your world representation.

The window can have the post it notes in same place whether it’s looking at your front lawn or the Sahara.

The best system I’ve ever used was a custom system. It used xml to represent layout and animations on objects, and gave them a name. That was then referenced by scripts attached to the xml to trigger any animations or sound effects in relation to game events. This meant the UI was scripted in the same fashion as any other element in the game world. There was a simple editor in C# to write out these xml files that had some similarities to flash, but was far more simplified.

A key benefit is that we have the expressive power of an editor. The script language was universal and gave us access to the same modules everywhere. Mainly everything is universal to the rest of the architecture. The one downside was that it didn’t integrate with the engine, but that’s one problem that you can solve by architecting your logic to run independantly in a dll. Another benefit is the markup can be merged.

People will tell you not to reinvent the wheel. UI is one of those few systems that tie completely into how your game is architected and should be treated as such. UI should not be treated as the bastard child of the rendering engine, tacking on some existing solution and hoping it’ll fit. In many cases it’s most of the way your players will interact with your game.

**Users never forgive a bad UI.**
