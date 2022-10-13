---
title: "Optimization Lessons: Keep Digging"
tag: programming
---
Continuing my kick on optimization I found a piece of code that was responsible for second long delays. It seemed simple at first. So I profiled and found one part of a loop was slow. Dug further and found the next was slow then the next, until I hit the bottom and found a binary search algorithm. It was implemented as a recursive call and so I thought I may gain by removing the recursion.

This turned out to be true…for the most part. It was an improvement when the number of iterations was more than a few, 1-3, and scaled up considerably nicely but below that it was slower. Not much but enough to weird me out. No matter what measure I used I couldn’t figure out why it was a few cycles slower and eventually gave up.

Anyway, I optimized some more and some more, eventually getting a good version of the binary search, but it was still slow overall. Then I checked the function to retrieve the value and found out that it calculated an array size every time. So, I pulled that out to the top of the loop and it saved a lot. Ultimate lesson here, always keep profiling and looking for the real cause of the problem. Don’t just assume that an optimization will work, or is the best you can do.