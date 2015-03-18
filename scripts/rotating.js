// rotating.js

var prefix = "images/outdoor";

var imageArray = new Array(6);
for (var i = 0; i < imageArray.length; i++)
    imageArray[i] = prefix + (i+1) + ".jpg";

var imageCounter = 0;

function rotate()
{
    var imageObject = document.getElementById('outdoor');
    imageObject.src = imageArray[imageCounter];
    imageCounter++;
    if (imageCounter == 6) imageCounter = 0;
}

function rotateImages()
{
    document.getElementById('outdoor').src = imageArray[0];
    setInterval('rotate()', 2000);
}