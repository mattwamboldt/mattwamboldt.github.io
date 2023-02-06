---
title: Tic Tac Woah
description: A pumped up version of Tic Tac Toe written in C++ with SDL. It was made with a one month hard limit. Based on Game Coding Complete.
githubUrl: https://github.com/mattwamboldt/tictacwoah
downloadUrl: https://github.com/mattwamboldt/tictacwoah/releases
thumbnail: /assets/images/projects/tictacwoah-thumbnail.png
backdrop: /assets/images/projects/tictacwoah-backdrop.png
preview: /assets/images/projects/tictacwoah-preview.mp4
startDate: 2016-02-01
lastRelease: 2016-02-27
date: 2016-02-27
---
Tic Tac Woah is a pumped up version of Tic Tac Toe. It was made with a one month hard limit. The AI isn’t finished and the volume controls don’t work, but it’s more stamina than I thought I’d have for Tic Tac Toe.

This project is written in C++ on top of SDL and started as a fork from an experimental repo. The readme lays out the overall project structure, which is informed heavily by Game Coding Complete by Mike McShaffry. The MVC-like architecture of application, view, and logic layers and the event system’s use of fastdelegate come from this book.

Theoretically sticking to this format means the logic could run separately from the rendering, making online easier, and making reasoning about the code easier. In practice I feel it was overarchitected, especially given the scale of Tic Tac Toe. Looking back I wish I’d gone more in the direction of building things as needed and abstracting out duplication as it arose.

Overall it was a fun challenge that opened my eyes on how easily things can be overthought.

The music is by Broke For Free used under a CC license. Check out [the album](https://brokeforfree.bandcamp.com/album/slam-funk) and give him some love for these great tracks.