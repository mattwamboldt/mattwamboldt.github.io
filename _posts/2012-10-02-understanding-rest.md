---
title: "Understanding REST"
tag: programming
---
Though a fan of sleep, this article is actually about a programming architecture that's come up often recently. [REST (REpresentational State Transfer)](http://en.wikipedia.org/wiki/Representational_state_transfer) is said to be used by many websites and services, but not completely according to many. After researching this for the last week or so I think I've stumbled into some reasons why it isn't fully understood, and can relate some potential uses that will clarify things a little.

## What is REST?

REST was initially described in a [doctoral dissertation by Roy Fielding](http://www.ics.uci.edu/~fielding/pubs/dissertation/fielding_dissertation.pdf). Most people say to read it to get the best idea of what REST actually is. As a doctoral paper it's not going to be easily understood by the masses of programmers who read it. That means the default resource becomes random blog posts like this one.

The first thing you'll find is that it's simply using HTTP methods properly, and having obvious human readable URLs on your web page. [Excellent article here for that explanation](http://www.peej.co.uk/articles/restfully-delicious.html). That's a start but REST is an architectural style, not a system itself. The key point is in the name. If you've ever worked with a state machine before, it's a bit like that, but with some key things to scale.

It's client server based, uses caching, and each resource, logical or physical, has a unique identifier and actions that you can perform on that resource. It's also stateless, meaning the server doesn't need to store state to work properly. When the client performs an action on a resource, the server performs actions or returns information, but it also gives links to the next possible set of actions. The client moves from state to state using the servers information. [An article that summed some of this up for me is here](http://www.xfront.com/REST-Web-Services.html).

## A non web example

I make games and work mainly with UI, so my first thought for this is obviously a game UI. When you transition to a new screen it gives the data to describe that screen as well as links for all the interactions on the screen. Clicking on a button will get the new state with the button depressed. This would mean you could separate the actions and screen flow from the rendering. Game UI is basically a website with more animation though so what else could we do?

The answer is a lot. Game systems are super focused around state machines, even audio. Usually an event system works best, but when dealing with commentary or dialogue trees this type of approach works well. If you have a game that uses past choices to affect current ones, using state to generate an XML of choices that the user picks from, separates the selection code from the choices being made. It also means you could build a bot to crawl through your dialogue trees without being tied to the specific game. If you want you could even listen to the dialogue in a browser without having to run the game. Always a bonus.

## Conclusion

REST is often used as a buzzword, like Node.js, but like Node, is useful in the right setting. Understanding it fully will make it easier to know which uses are helpful and fit it securely into your toolbox. If you can, read the dissertation, cause I'm sure I mistook some aspect like most others