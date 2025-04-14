+++
title = "SUS Hardware Description Language"
description = "A new Hardware Description Language to compete with the likes of SystemVerilog and VHDL"
weight = 1
template = "page.html"

# [taxonomies]
# tags = ["meta"]

[extra]
local_image = "img/SUS_Logo.png"
+++

The raison d'être of this project stemmed from my [Dedekind](/NinthDedekind) work. I did the Hardware Design for this project with plain SystemVerilog, and in doing so bumped against every possible issue that occurs when doing so. I found that the existing repertoire of languages is too difficult to work with to build meaningful hardware accelerators. On the other hand, HLS (or High Level Synthesis) takes away so much freedom from the hardware design process, and more importantly, takes away the insight into what hardware is actually generated. So some middle-road is needed. SUS is my (perhaps ill-fated) attempt at making a language that maintains the control we need, while being useable enough to do productive work with. 

I'm working on this actively during my PhD position at the [Paderborn Center for Parallel Computing](https://pc2.uni-paderborn.de/). And the main goal is to see adoption of it, to replace the HLS code we currently use at PC2. 

More information can be found on the repository: [https://github.com/pc2/sus-compiler](https://github.com/pc2/sus-compiler)

It also has a website now: [https://sus-lang.org](https://sus-lang.org), or a more trendy [https://sus.rocks](https://sus.rocks). 
