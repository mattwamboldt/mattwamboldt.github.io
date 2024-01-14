---
title: "5 Tips to be a More Professional Software Engineer"
tag: programming
excerpt: Here are 5 soft skills from my 15 years experience that have made it easier to work in teams of various sizes.
image: /assets/images/blog/professional-programmer.jpg
---
Here are 5 soft skills from my 15 years experience that have made it easier to work in teams of various sizes:

## 1. Adopt a "When in Rome" style
You were hired to work on solving problems, not insert your opinions on the quirky function naming scheme
you picked up from some open source repo. Learn the style and conventions of the codebase you're working
in and conform. On greenfield projects, if you have experience shipping, maybe you can toss out some
suggestions, but generally the way the company does things is not a discussion.

This also applies to tooling. Bringing in your favourite IDE will make you slower and harder to work with.
The company already has its tech stack well sorted, its cleared the legal department for licensing and
security. Any libraries or frameworks they use will be known well by the other staff, making questions
quick to answer.

Save yourself the time/effort and "Code like the Romans do".

## 2. Leave the campsite cleaner than you found it
Technical debt is a constant enemy. If you're working on an area of code and find something that
is hard to read or understand, then it can be worth following this rule from the scouts and cleaning things up.
This may include pulling parts of a long expression into well named intermediate variables, or replacing
some arcane syntactic sugar with something more vanilla.

However, don't go rearranging the whole forest, stick to the "campsite". Sweeping changes should be
kept to a minimum in general and done in their own PR. The more unrelated changes in your PR, the harder
it is to review. Junior developers should be extra careful, as you'll be more tempted to overdo it or
use "cool looking" syntax that can end up being less readable.

## 3. Don't take review comments personally
Developers aren't known for their interpersonal skills and this can carry through to reviews. Senior
developers will be blunt and won't couch things in fluffy language to make you feel better. They'll
state ways they think the code could be better, or ask clarifying questions if your approach isn't
obvious. They also **won't** criticize you as a person.

You are **not** your code. You're going to miss stuff or not think of all the edge cases. You're only
human. Review is there to help you learn what to look for, just as much as it's there to prevent bugs
and ensure code quality.

## 4. You are not too smart to ask questions
Speaking of being only human, many programmers have a sore spot when it comes to being seen as stupid,
or not knowing something. Maybe because a lot of us grew up as "gifted" kids saddled with the expectation
that we know everything, or you need an ego the size of a semi-truck to withstand the constant failure
of this job, either way it's a pattern. This is something you'll need to work past to be successful
long term.

Firstly because you can't know what you don't know. Even on a solo project you'll have to search for
answers to the questions you have and this isn't a sign of weakness or stupidity. You weren't expected
to know linear algebra in gradeschool so cut yourself some slack if you haven't encountered something
before.

Second, and this often comes up for devs straight out of school, it's not cheating to ask for help.
On a project large enough to require a team, each member will end up having a subset of the code that
they know better than anyone. You'll need to contribute to those parts of the code and the only way to
learn how it works is to read it and ask them when you get confused. There is no exam or detention for
copying the answers, we're all in this boat together.

Reading documentation, asking colleagues for help, and looking things up online are all valuable skills
that will make you better. By all means try to find the answer on your own first so you aren't annoying
people, but if you're stuck for awhile it's better to ask than to sit in frustration and burn time because
you're afraid to look stupid. Remember we've all been through it.

## 5. Nothing is impossible, but it might take too long

Real projects have real schedules. They have release dates that are driven by client demand and budgets.
Marketing dollars are spent months in advance and timed to the release so they aren't wasted. Many
programmers, especially experienced ones, when asked if a task can be fit into the schedule will
reflexively say it's impossible. Maybe they don't know all the details, or the only way to do it
"the right way" is to do a rewrite of some large subsystem that would take weeks.

Whatever the reason they just say No.

No is a brick wall: firm, immovable, unimaginative, and most importantly "No" doesn't ship software.
What managers and C-level people want to hear are options and tradeoffs. They can decide whether it's
worth doing the big rewrite, if they're fine with a hack solution, or some other alternative, but no
is not a decision, it's defeat.

People start businesses to make things happen and satisfy customers, not maintain code purity ideals,
and not to hear no from the person they are paying to make said things happen. They aren't dumb, if
something's gonna take too long but it's pivotal to quality, they want to know that and do it ASAP.
They will move deadlines but only if it's important to the business, not to you.

I was the no guy for several years, don't be the no guy. Work with the management team, not against it.

## Conclusion

Been awhile since I've written for this blog but hopefully this is helpful to people. Alluded to this
a few times but these are lessons I've had to learn as well, some quicker than others. Overall I think
several of these point to a general mindset that might be a good note to leave on:

**Be humble and learn so you can be a solid resource for the team to lean on, while not being afraid to lean on and trust them in return.**

