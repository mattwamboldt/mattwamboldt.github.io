---
title: "Languages: Perl"
tag: programming
---
Perl is an extremely useful and flexible language. It’s almost like a programming Play-doh. At the same time it can be stable and used to hook programs together. In that sense it’s like glue. I’ve gotten to work in the language for the last 5-6 months and I have really come to appreciate it. So, I’ll go into specifics of why I like it and when it’s been useful.

The best place to use Perl, (and from what I’ve read it’s intended use) is to manipulate some structured input into some output. This could be stdin and stdout but it’s been files in my case. Perl’s amazing regular expression support, built in hashes and ease of file manipulation make it a great fit for this task. It’s a bit like compilation, only much more quick and dirty than that. Once you reach a certain complexity it’s probably best to switch to writing a compiler if it’s straight translation.

Perl is also very easy to write, which is both a blessing and a curse. It allows rapid iteration, but you can end up with an unreadable mess after awhile. Perl is very big on symbols as well, so it’s easy to obfuscate your code if you’re not careful. If you take the time to be careful you can get some very nice code. Using pre-made modules can help with this and also provide some extra functionality you may not have thought about.

When we use Perl in games it’s most often in what we call a build pipeline. A build pipeline is a set of steps or stages that the source files go through in order to be in the final built format that ships on disk. Each of the stages is some program that receives input from the previous programs in the pipeline and generates some new output. In many games these programs are written in or simplified by perl scripts. That usage of Perl as a “glue” language is a common idea not only in games, but in other places you may see Perl. It’s a great language and a good one to have in your toolbox, check it out.