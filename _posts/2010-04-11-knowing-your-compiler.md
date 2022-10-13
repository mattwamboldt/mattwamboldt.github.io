---
tag: programming
---
While looking through our code base’s actionscript interpreter for a bug, I realized there were several language features not in use, and optimizations I could make to my scripts. As I got side tracked from the bug and started looking more at the surrounding code, it started to all make sense. I was getting a better vibe for the paradigms and structure that the interpreter would flow best through. Better understanding what the language was all about.

For example, I’d been reading and watching a lot of video about Scheme lately. Functional programming languages seem to have a lot of abstracting power that can really allow you focus on one part of the problem. The best part is that functions can be easily, and are encouraged to be, used as data. So you can define a function that iterates over a structure and takes another function to manipulate each item. I was super happy to find out that this exists in actionscript, and have started using it already to create generic programmatic animation functions. It works quite well for this.

Going to a lower level may seem scary at times, or overwhelming, but It can really boost your understanding. Also as a side note, look at languages that are off the beaten path. You may find something your language supports, that you wouldn’t have understood without looking at a language that uses only that method.