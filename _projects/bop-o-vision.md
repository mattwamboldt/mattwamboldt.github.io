---
title: Bop-O-Vision
description: Web based music player and visualizer, inspired by old apps like WinAmp.
githubUrl: https://github.com/mattwamboldt/bop-o-vision
liveUrl: https://mattwamboldt.com/bop-o-vision/
image: /assets/images/projects/bop-o-vision-thumbnail.png
backdrop: /assets/images/projects/bop-o-vision-backdrop.png
preview: /assets/images/projects/bop-o-vision-preview.mp4
date: 2020-02-01
startDate: 2019-11-02
lastRelease: 2020-02-01
---

Sometimes you get nostalgic and on this occasion I was remembering the days of dedicated music software.
WinAmp, Windows Media Player Classic, iTunes and others, used to feature these psychadelic visualizations
to go along with what you were listening to. At some point they fell out of favour but inspired by
[a coworker's example](https://vimeo.com/137999365?fbclid=IwAR39F__t4OoYqLK8joHCxHT8a6X-JVbVo9LXIOZ_TiTytAcXOS97zQdV-pM){:target="_blank"}
I got curious about building one.

Embedded below in an iframe so you can play around with it. Read on to learn more.

<iframe frameborder="0" src="https://mattwamboldt.com/bop-o-vision/"></iframe>

## How it works
The base layout is done using a set of components in ReactJS that are flex boxed to let the canvas in
the center retain the bulk of the space. App state is minimal so I kept solutions like redux out for
now and instead relied on props, component state, and some static arrays to define the track and
vizualizer lists. Most of it is standard ReactJS so the interesting code is in the index.tsx.

### Audio Processing
Browsers provide access to the Web Audio API, which allows loading and processing of audio streams.
The songs are loaded into an html5 audio element. This serves as our AudioSource and is then connected
to an AnalyserNode and then the Browser's output, which comes from window.AudioContext. Instead of
the sound from the html audio element going straight to the speakers, we've stuck a middleman in there
to do some work for us.

AnalyserNode uses a Fast Fourier Transform (FFT) to calculate how much certain frequencies show up in
the last x amount of time. For example if there was a big drum hit you'd get low frequencies having
larger values in the output of the analyser. For this project I decided to use the built in AnayzerNode,
but FFT is a common algorithm for signal processing so it may be fun to learn later.

### Visualization
A 2d canvas is used to render the visualizations. The draw function is called recursively with requestAnimationFrame
and switch cases to the currently selected visualizer. Before rendering, the canvas is filled with a
faded black rectangle to create a ghost like afterimage of the previous frames that fades over time.
It just makes things less harsh.

We can get two things out of AnalyserNode which are shown in the first two visualizers:
- **Time:** The raw waveform for the last time slice, think an oscilloscope. Draws a set of line segments,
left to right, with the y of each point scaled by amplitude and canvas height.
- **Frequency:** The frequencies found by the FFT and how loud they are, think of an equalizer. Drawn
as a bar graph with amplitude being the height of each bar.

#### Circle (Bit more complicated)
*Note: Celebration shows this one off best. Carefree is too chill.*

An attempt to recreate the original video. Needs more work but I think this is the general method.
Break the circumference of the circle into a set of points, with each controlled by a different entry
in the buffer we get back from the analyser.

The circumference of a circle is 2 * PI radians, so multiply that by the percentage we've iterated
through the buffer to get the radians for each entry. Using cos and sin on that gives the x and y of
a unit vector pointing in the direction of that point on the circumference. That can then be scaled
by the desired radius of the circle plus an offset based on the amplitude. Translating by the circle's
position gives us a final position of our next point to draw.

Connect all those points with lineTo and you just drew a circle that juts in and out like in the video.

It currently uses the time domain, but narrower bands of the frequency domain are probably needed to
get the right effect. Separating out the frequencies into lo, mid and high would also be the next
stage to do more complicated effects later.

## References
A couple of useful links in case you want to learn more about web audio processing:

- [Mozilla Developer Site: Web Audio API](https://developer.mozilla.org/en-US/docs/Web/API/Web_Audio_API){:target="_blank"}
(Awesome resource in general)
- [Web Audio Api by Boris Smus](https://webaudioapi.com/book/){:target="_blank"}
- [The Coding Train's series on Sound.](https://www.youtube.com/watch?v=Pn1g1wjxl_0&list=PLRqwX-V7Uu6aFcVjlDAkkGIixw70s7jpW){:target="_blank"}
(Based on P5 but it's a loose wrapper over the Web Audio API so the concepts apply. Actually visualizes a bit at the end.)

## Credits

The two test tracks are from [Incompetech](https://incompetech.com/music/royalty-free/music.html){:target="_blank"},
a classic source for all your YouTuber royalty free backing tracks. I guaruntee you've heard at least
one of these.

### Track 1
"Carefree" Kevin MacLeod (incompetech.com)<br />
Licensed under Creative Commons: By Attribution 4.0 License<br />
<http://creativecommons.org/licenses/by/4.0/>{:target="_blank"}

### Track 2
"Celebration" Kevin MacLeod (incompetech.com)<br />
Licensed under Creative Commons: By Attribution 4.0 License<br />
<http://creativecommons.org/licenses/by/4.0/>{:target="_blank"}