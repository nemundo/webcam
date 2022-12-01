# To Do

- Image Slider
- Convert to Video
- Interval
- 1:1 Image / 4:3 Image etc.
- Cropping Position
- (Change)Log
- Source
- Deaktivierung von Webcam
- Region (nm-Region)
- User für Source ("access_source_user") / Bearbeiten nur für Source Owner
- Last Change (User/DateTime)
- Status (Entwurf/Published/Delete)
- Workflow (Fehler entdeckt)
- Workflow (Vorschlag für neue Kamera) / Webcam hinzufügen
- Timelapse Video
- 
- 
- 
- 
- 
- Width/Height/Image Size

- Aspect Ratio
- Archiv Funktionalität
- Einfügen von POI's in Bild
- Search in Admin
- Fix Image Url (/latest/1200/rigi.jpg) 
- DateTime bei Slider
- Total Disk Space
- Comment



## Anbieter




### Yellow Camera
https://yellow.webcam/de/

Description:
https://avisec.atlassian.net/wiki/spaces/YD/blog/2019/02/11/620265477/Wie+ver+ffentliche+ich+eine+Yellow-Webcam+auf+meiner+Webseite






https://api.yellow.camera/feed/pano/H81UO1IT6




https://api.yellow.camera/feed/pano/hotel-villa-honegg


https://api.yellow.camera/feed/pano/Y19175


https://api.yellow.camera/feed/vitznau_preview/latest.jpg


https://api.yellow.camera/feed/hotel-villa-honegg_preview/latest.jpg


https://api.yellow.camera/feed/AKSXMMXXR/latest.jpg

https://api.yellow.camera/feed/WZQ5DD2D0/latest.jpg

https://api.yellow.camera/feed/H81UO1IT6/latestpreview.jpg

https://api.yellow.camera/feed/IWB4F1LTI/latestpreview.jpg


https://feed.yellow.webcam/feed/AKSXMMXXR



https://feed.yellow.camera/WZQ5DD2D0









https://www.feratel.com/



## Example
https://www.luzernmobil.ch/aktuelles/webcams





## Timelapse

### Timelapse

https://medium.com/@sekhar.rahul/creating-a-time-lapse-video-on-the-command-line-with-ffmpeg-1a7566caf877


```
sudo ffmpeg -i "670/2021-05-03/*.jpg" output.mpeg


sudo ffmpeg -framerate 10 -pattern_type glob -i "670/2021-05-03/*.jpg" -s:v 1440x1080 -c:v libx264 -crf 17 -pix_fmt yuv420p my-timelapse4.mp4


```

