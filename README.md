# Suggestions

This project would be a good fit for a demonstration purpose. But making process from here would require some big changes which include Authentication, Scalability for Search and Storing of media files.

## Authentication.
One of the disadvantages of the project is authentication. Currently, there isn't any security for users. whereby only authenticated users can access the resources. Also, it gives users other benefits if included like the history of video watched and stored video as a wishlist in case they need to view or purchase later.

## Search Function
The project currently has basic search functionality, but when building a system for thousands of users it isn't fit for that purpose. Either one builds an algorithm or an existing one which an example would be Algolia. Algolia search is fast and capable of delivering real-time results from the first keystroke. 

## AWS for storing images and video.
When it comes to storing large information like images and video, its always best to keep it away from the director where the files are stored. A good example would be AWS S3. Simple Storage Service (S3) is a good place to store your files. S3 can serve files directly to your users or application through HTTP. Your files are stored in something called buckets. File URLs will look something. This information can be stored in the database. Which can be accessed using a link. I have used youtube to display the video for the tutorial, Youtube is an example. The files are stored elsewhere but can be assessed using a link id which works with a URL to display.  
