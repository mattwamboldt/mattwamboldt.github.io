---
title: Rasterizer
started: 2015-09-09
description: After years of game dev I was tired of not fully understanding 3D rendering. So I set out to create a renderer and learned just how simple it actually was.
githubUrl: https://github.com/mattwamboldt/rasterizer
downloadUrl: https://github.com/mattwamboldt/rasterizer/releases
---
After years of being a game programmer I was tired of not fully understanding 3D rendering. Most books were obtuse and hard to follow. They treated many aspects of the pipeline as magic to take for granted. In the immortal words of Richard Feynman “What I cannot create, I do not understand.” So I set out to create and learned just how simple it actually was.

## Overview

This project is written in C++, using SDL as a way to render the surface that we’re drawing to. A surface is just an in memory buffer that represents an image, a bit like a canvas. All of the 3D and basic shape rendering code sets the color of the pixels in this image using various algorithms and fancy math.

The sample given shows a vector shape clock and a familiar gouraud shaded model of the Blender monkey, Suzanne, rotating at a set speed. Portions of knowledge came from [this microsoft tutorial](https://blogs.msdn.microsoft.com/davrous/2013/06/13/tutorial-series-learning-how-to-write-a-3d-soft-engine-from-scratch-in-c-typescript-or-javascript/), but the real epiphany for me came from Game Coding Complete by Mike McShaffry. Armed with this base, rendering is now a fun topic to learn about.

## Basic Shapes

The first step was learning how to get a surface to draw to, then drawing lines and basic shapes. For this I used SDL to create the surface and wrapped it in a class that represents the screen. Then I looked into line drawing algorithms, running first into a naive for loop, then into the Bresenham algorithm.

Bresenham uses one loop and increments an error value based on the slope. The error value then determines when to increment or decrement the y value. The midpoint circle algorithm, which is used for drawing circles, also uses this error value. Then I came across several methods for rendering triangles which would come in handy for the 3d part of our adventure.

## 3D Mathematics

Next up was learning about 3d math and rendering a set of points rotating around it’s center. I started with the basic 2d, 3d and 4d Vector operations that were easy to understand from a mathematical perspective. Then I had to learn about matrices, with their various conventions and debates about storage and order and whatnot.

Once I had that down, It was on to applying those matrices to a set of points, as well as projecting them onto my screen. That then lead to learning about the difference between othographic and perspective projections and a rudimentary understanding about cameras, view frustrums and applying these transformations over time to do basic animation.

## Triangles, Normals, and Lighting

Armed with a basic understanding of scanline converstions and triangle rendering I started with flat colored triangles. Then after learning about normals, it was on to flat shading and the depth buffer. After that and learning about interpolating various values across a triangle and scanline I was able to add gouraud shading and bring the demo to where it is today.

This process has taught me where the various shaders that we run across fit into the picture. Pixel shaders are just something run over the results of the scanline process. Vertex shaders just fit into the transformation and projection part. All those diagrams now make so much more sense, but there’s still so much more to do.

## Future

I want to learn about a ton of different shading techniques, which are still a mystery to me. There are also obvious things to add such as shadows, texture mapping and normal mapping. Some code cleanup would make further learning easier and demos more accessible and efficient. Overall rendering is fun and not nearly as complex as I first imagined!