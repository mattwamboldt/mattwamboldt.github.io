---
title: "Code Reviews"
tag: programming
---
I've been reading several articles on [altdevblogaday about code reviews](http://altdevblogaday.com/2011/09/28/why-code-reviews-can-fail/). We've been doing code reviews at work since I started, at first doing over the shoulder reviews and then automated reviews.  I prefer over the shoulder because the other person gets a better feel for why you're making your changes. Those can tend to have draw backs at a large scale so, after combing these articles, here is my ideal code review set up.

## Distributed Source Control
Systems such as [Mercurial](http://mercurial.selenic.com/) and [Git](http://git-scm.com/), allow the programmer to more easily manage separate streams of work using local branches. You can continue making changes in other branches, while finished changes await review. When done, the coder can submit the reviewed code, and merge branches for the next review.

With centralized source control, branches are full copies of a repository, making them expensive and scary to some developers. Distributed system's use [hard links](http://mercurial.selenic.com/wiki/HardlinkedClones), and only take a bit more space than the changes you make in that branch. Typical systems make merging branches so complex as to require it's own engineer. [In a distributed system, merging is apparently not as big an issue](http://hgbook.red-bean.com/read/a-tour-of-mercurial-merging-work.html).

## Textual Data Formats
[Use text formats](http://www.nickdarnell.com/2011/10/making-your-files-merge-friendly/)! Odds are you'll have data under source control. Using text will not only shrink the size of the repository in the long run, but allow merging of data files as well. I can't begin to describe how many times I go to work on a data file and an artist has it exclusively checked out. Not an issue with text formats.

Text based data also means it can be reviewed. For example, in the case of games utilizing a database, you can add schema changes to code reviews. This creates a much clearer picture and allows reviewer suggestions for sizing, column names etc.

## Automated Code Reviews
Though I enjoy over the shoulder review best, reviewers want to be able to bunch up reviews. They'll check it once every hour or two and knock them all out at once. It's more efficient than a constant stream of interruption from people wanting reviews.

Avoid paper reviews, or code review meetings. You shouldn't waste paper, and meetings are painful for everyone. Besides we make games, not weapons guidance systems or medical software.

We use different tools at work depending on whether an external team is involved. I've gotten chance to use [ReviewBoard](http://www.reviewboard.org/), and [Code Collaborator](http://smartbear.com/products/development-tools/code-review/features/). I personally think ReviewBoard is the easier to use product, plus it's free. I'd like to try others in the future, or see what it's like to set up one of these systems.

## Conclusion / TLDR
Code review is a vital part of any team with multiple people. Distributed Source control prevents people from getting blocked waiting on a review. Textual data formats allow for merging of otherwise binary data, and add more context for changes. Automating your review process will simplify the whole thing and cause fewer interruptions than over the shoulder reviews.

Hope this has steered you to some cool new tools and information. If you have other setups or software that you use, feel free to comment or email me.