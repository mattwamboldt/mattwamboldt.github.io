---
title: "Languages: Brainfuck"
tag: programming
---
*Note: I'd normally not swear but that’s the name of the language; no point sugar coating it.*

For those that haven’t heard of [BrainFuck](http://en.wikipedia.org/wiki/Brainfuck), it’s a terse programming language designed to have the smallest compiler possible. Useless for production, it's still a fruitful language experiment and entertaining oddity. The language consists of:

- a block of data (memory)
- a pointer to that data
- a pointer to the current instruction
- a way to do I/O
- 8 instructions represented by single ASCII characters

Though difficult to read and write, you can theoretically create any program with this simple set of features. It’s a fun and compact concept. Many compilers and interpreters for it are miniscule, under 200 bytes; note the lack of prefix there.

I decided to kill some time one day by writing an interpreter for this language in Perl. The script is small enough that I've added it below.

{% highlight perl %}
#make sure there is a program to run
scalar(@ARGV) == 1 or die "Usage: interpretter.pl <filename>\n";

#allocate the data and instructions as arrays
my $numCells = 3000000;
my @cells = ();
$#cells = $numCells - 1;

my @instructions;

#initialize pointers as indices into the above arrays
my $dataPointer = 0;
my $instructionPointer = 0;

#open the program and strip out invalid chatacters
open FILE, $ARGV[0] or die $!;
my @lines = <FILE>;
my $contents = join('',@lines);
$contents =~ s/[^][><.,+-]//g;
@instructions = split('', $contents);

#run the program
while($instructionPointer < scalar(@instructions))
{
    my $command = $instructions[$instructionPointer];
    
    #increment and decrement the data pointer
    if ($command eq '>') { $dataPointer++; }
    elsif ($command eq '<') { $dataPointer--; }
    
    #increment and decrement the current data
    elsif ($command eq '+') { $cells[$dataPointer]++; }
    elsif ($command eq '-') { $cells[$dataPointer]--; }
    
    #input / output the current data
    elsif ($command eq ',') { $cells[$dataPointer] = ord(getc(STDIN)); }
    elsif ($command eq '.') { print chr($cells[$dataPointer]); }
    
    #conditional jumps: equivilent to - while currentdata != 0
    elsif ($command eq '[')
    {
        if(not $cells[$dataPointer] || $cells[$dataPointer] == 0)
        {
            while($instructions[$instructionPointer]
                && $instructions[$instructionPointer] ne ']')
            {
                $instructionPointer++;
            }
        }
    }
    elsif ($command eq ']')
    {
        if($cells[$dataPointer] && $cells[$dataPointer] != 0)
        {
            while($instructionPointer >= 0
                && $instructions[$instructionPointer] ne '[')
            {
                $instructionPointer--;
            }
        }
    }

    $instructionPointer++;
}
{% endhighlight %}

The interpreter is quite simple. It sets up the variables, strips out the invalid characters using regular expressions, and runs some code on every character. Whille not as compact as possible, it works well enough for me.

Writing and testing only took an hour and a half, any programmer could do it. Having written a simple interpreter, it’s tempting to do something more complex and useful. Maybe you could design a domain specific language, or integrate Python or Lua into your game engine. Learning about languages opens doors.