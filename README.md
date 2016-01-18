[![Build Status](https://travis-ci.org/freshp/xlsx-appender.svg?branch=master)](https://travis-ci.org/freshp/xlsx-appender)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Latest Stable Version](https://poser.pugx.org/freshp/xlsx-appender/v/stable)](https://packagist.org/packages/freshp/xlsx-appender)
[![Total Downloads](https://poser.pugx.org/freshp/xlsx-appender/downloads)](https://packagist.org/packages/freshp/xlsx-appender)

# Append data to existing xlsx file

This library is useful to append data rows to big xlsx files. It is possible to write your data to a temporary file with content given from XlsxRowTemplate. After finishing this file, it is possible to give this filepath to the XlsxAppender. The given temporary file will be deleted.

The library will not take a look at the xml structure of the worksheet. The main feature of this library is to write big data to a xlsx file with less memory size and execution time of the current server. (There will proceed no xml parsing!)

In the current Version it is just possible to write plain text, integer or boolean value to the xlsx file.

# Tips

* Take a look in the example folder of this repository to get an impression, how this library is used.
* If the reader of the xlsx-file will not show data which was add by XlsxAppender: Open the Xlsx file with an editor like TextWrangler. Take a look at the xml data of the worksheet. The reader of the xlsx-file will not show data, if there are still some rows with the same linenumber or cells with the same coordinate.
* Get involved - for more functionality in this library 

# TODO´s

* adding of some styling structure to cell templates like font-color or font-weight
* fix data handling for xlsx files if there are some cells marked
