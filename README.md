UploaderBundle
===================

> **Disclaimer:** This is a forked package to test FineUploaders concurrent chunking feature. 
You should not use this package. 
This is the original: [OneupUploaderBundle](https://github.com/1up-lab/OneupUploaderBundle)  

The OneupUploaderBundle for Symfony2 adds support for handling file uploads using one of the following Javascript libraries, or [your own implementation](https://github.com/1up-lab/OneupUploaderBundle/blob/master/Resources/doc/custom_uploader.md).

* [FineUploader](http://fineuploader.com/)
* [jQuery File Uploader](http://blueimp.github.io/jQuery-File-Upload/)
* [YUI3 Uploader](http://yuilibrary.com/yui/docs/uploader/)
* [Uploadify](http://www.uploadify.com/)
* [FancyUpload](http://digitarald.de/project/fancyupload/)
* [MooUpload](https://github.com/juanparati/MooUpload)
* [Plupload](http://www.plupload.com/)
* [Dropzone](http://www.dropzonejs.com/)

Features included:

* Multiple file uploads handled by your chosen frontend library
* Chunked uploads
* Support for: [Gaufrette](https://github.com/KnpLabs/Gaufrette) / [Flysystem](https://github.com/thephpleague/flysystem) / local filesystem
* Provides an orphanage for cleaning up orphaned files
* Supports [Session upload progress & cancelation of uploads](http://php.net/manual/en/session.upload-progress.php) as of PHP 5.4
* Partially unit tested (1.8 features tests are pending)

Documentation
-------------

The entry point of the documentation can be found in the file `Resources/docs/index.md`

[Read the documentation for master](https://github.com/zelding/OneupUploaderBundle/blob/master/Resources/doc/index.md)

Update Notes
-------------
* Version **1.8.0-alpha1** supports concurrent chunking with FineUploader frontend, just bear in mind it is alpha. 

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [Github issue tracker](https://github.com/zelding/OneupUploaderBundle/issues).

When reporting a bug, it may be a good idea to reproduce it in a basic project
built using the [Symfony Standard Edition](https://github.com/symfony/symfony-standard)
to allow developers of the bundle to reproduce the issue by simply cloning it
and following some steps.
