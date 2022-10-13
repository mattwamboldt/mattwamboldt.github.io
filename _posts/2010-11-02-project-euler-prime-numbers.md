---
title: "Project Euler: Prime Numbers"
tag: programming
---
Learning algorithms for quickly finding primes and testing whether a number is prime will greatly enhance your ability to solve project Euler problems. Since it’s key to so many problems I’ll link to some resources I used, and try to paraphrase what I’ve learned, linking to each concept. The links are necessary since you’ll get a pretty incomplete picture from me, but it’s a place to start.

[The PrimePages](http://primes.utm.edu/) is a must visit site and will introduce the basic ideas behind prime numbers. [Wikipedia](http://en.wikipedia.org/wiki/Prime_number) has fuller explanations and history of prime numbers. You’ll find sample code at [Rosetta Code](http://rosettacode.org/wiki/Main_Page), with implementations of several algorithms in multiple languages.

Here are the algorithms that will be most beneficial:

## Sieve of Eratosthenes

The first thing you’ll need is a way to quickly generate a list of primes up to a given maximum, or infinity if you’re using a functional programming language. The sieve will do that, and a great explanation of it can be found [here](http://primes.utm.edu/glossary/xpage/SieveOfEratosthenes.html). If you’re in Haskell in particular [this is an excellent paper](http://www.cs.hmc.edu/~oneill/papers/Sieve-JFP.pdf) explaining how to construct a sieve that runs quickly, and avoids an easy pitfall of implementing this in a functional language. Basically, be careful you’re not just doing trial division.

## Prime Factorization

You’ll also need a way to create the pairings of prime factors of a number and what power of that prime divides into the number, for example 12 is 2^2 and 3^1. In some cases you’ll only need the primes, but tacking on the extra power information will help you out later. You do this by dividing the number by each prime until it will divide no more, or the next prime squared is greater than the number.

## Euler’s Totient (Phi)

This is the amount of numbers less than a number that don’t have a common factor with the number, other than one, this is called a co-prime. For example 9 has 8,7,5,4,2,1 meaning the Euler totient of 9 is 6. The best way to calculate this is to find all the prime factors of the number and follow [this formula](http://en.wikipedia.org/wiki/Euler%27s_totient_function#Computing_example). It’s the simplest version I could find.

## Primality Testing

The sieve will only get you so far. Once you get into large numbers and only need to know whether or not the number is prime you’ll want to turn to a primality test. The one most commonly used that I’ve seen is the Miller-Rabin test. The best place to turn to for explanation in this case is to read the code at [Rosetta Code](http://rosettacode.org/wiki/Miller-Rabin_primality_test) and some of the [PrimePages](http://primes.utm.edu/prove/prove2.html). Wikipedia and most other sites explanations are far more math heavy than is digestible by the average programmer. I definitely don’t have it down well enough to explain it, and this is where I’m stuck with the euler problems.

That’s it! I’m sure there are more things to figure out prime-wise on the higher numbered problems, but good implementations of these four algorithms will make solving a large portion of the problems a breeze. Implement them yourself though, because that’s the fun of the project.