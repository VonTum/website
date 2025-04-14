+++
title = "Computing the Ninth Dedekind Number"
description = "A computation of the Ninth Dedekind Number using FPGA Supercomputing"
weight = 1
template = "page.html"

# [taxonomies]
# tags = ["dedekind", "hardware-design", "verilog", "C++", "OpenCL"]

[extra]
local_image = "img/NinthDedekind.png"
+++

This project started out as my KU Leuven Master's Thesis, but after the thesis was handed in lasted another two years. It was a collaborative effort between myself, my former promotor Prof. Patrick Decausmaecker and mentor Jens Goemaere, both at KU Leuven, as well as my new contacts: Prof. Christian Pless, Dr. Tobias Kenter, Dr Heinrich Riebler, and Dr. Michael Laß. 

In the thesis itself I proved that this computation is possible with a modestly sized FPGA cluster, for which I was able to perform the first computation of the set of all interval sizes in 7 variables, a feat never achieved before! With this in had, I began the work on an advanced Hardware Accelerator. The basic algorithm consisted of computing $1.148 * 10^{19}$ "P-Coëfficients". It happened to be that computing these P-Coëfficients was uniquely well-suited to a hardware implementation, due to the very boolean-logic nature of the individual calculations, as well as the heavy misprediction of a critical branch in a CPU implementation. 

$$ D(n+2) = \sum_{\alpha \in R_n}{D_\alpha|[\bot,\alpha]|\sum_{\substack{\beta \in A_n \\ \alpha \leq \beta}}{P_{n,2,\alpha,\beta}|[\beta, \top]|}} $$

In the end, after three years of work and 47'000 of FPGA compute hours, we managed to find the number, it is: 286386577668298411128469151667598498812366. 

Dedekind Numbers: [OEIS:A000372](https://oeis.org/A000372)
| n   | D(n)                                       |
|-----|--------------------------------------------|
| 0   | 2                                          |
| 1   | 3                                          |
| 2   | 6                                          |
| 3   | 20                                         |
| 4   | 168                                        |
| 5   | 7,581                                      |
| 6   | 7,828,354                                  |
| 7   | 2,414,682,040,998                          |
| 8   | 56,130,437,228,687,557,907,788             |
| 9   | 286,386,577,668,298,411,128,469,151,667,598,498,812,366 |

## We made several publications regarding this work:

[Hir22] Lennart Van Hirtum, Patrick De Causmaecker, Jens Goemaere. 2022. A path to compute the 9th Dedekind
Number using FPGA Supercomputing. [https://hirtum.com/thesis.pdf](/thesis.pdf)

[Hir23] Lennart Van Hirtum and Patrick De Causmaecker and Jens Goemaere and Tobias Kenter and Heinrich Riebler and Michael Lass and Christian Plessl. A computation of D(9) using FPGA Supercomputing. Preprint [arXiv:2304.03039](https://arxiv.org/abs/2304.03039) 

[Hir24] Lennart Van Hirtum, Patrick De Causmaecker, Jens Goemaere, Tobias Kenter, Heinrich Riebler, Michael Lass, and Christian Plessl. 2024. A Computation of the Ninth Dedekind Number Using FPGA Supercomputing. ACM Trans. Reconfigurable Technol. Syst. 17, 3, Article 40 (September 2024), 28 pages. [https://doi.org/10.1145/3674147](https://doi.org/10.1145/3674147)

[Dec24] Patrick De Causmaecker and Lennart Van Hirtum. Solving systems of equations on antichains for the computation of the ninth Dedekind Number. [arXiv:2405.20904](https://arxiv.org/abs/2405.20904)

And the code can be found here: [https://github.com/VonTum/Dedekind](https://github.com/VonTum/Dedekind)

The data can be found at: [Zenodo](https://zenodo.org/records/10579803)
