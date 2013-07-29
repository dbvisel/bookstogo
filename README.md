bookstogo
=========

A quick web project to give books away.

Set up
------

First, you're going to need to have a Google Doc spreadsheet with your list of books. The first row of the spreadsheet needs to be the header row; it should have these values:

* sold
* author
* title
* notes
* isbn

I have two more columns named "amazonprice" and "listed" but those aren't important. List all of your books in the spreadsheet. When you're ready, what you need to do is to publish the sheet as CSV. In Google Docs, go to *File > Publish to the Web*; choose to publish it as CSV, and copy the URL it gives you, which should look something like this:

https://docs.google.com/spreadsheet/pub?key=XXXXXXX&single=true&gid=0&output=csv

Now go into *input.json.php* and paste that URL into the value of *$feed* in line 9. That's all you should need to change! Probably you also want to change some of the text of *index.html* and *process.php* if your name is not Dan and you are not moving to Bangkok. Also change the email that it's sending the form to in *process.php* in line 69.

Upload all three of these files in the same directory on a webserver that has PHP running; go to *index.html* and it should work.

Maintenance
-----------

When someone requests a book, an email is sent to the email address that's in *process.php*. The request is also logged to a file in the same directory, *requested.txt*: I did this because sometimes emails weren't coming through because of my webhost. You could turn this off if you don't want to do this. 

When someone requests a book, I put their name in the first column of the Google spreadsheet; when the page loads, if there's a value in the first column, the book is not shown.

