FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginPdfPreview, FilePondPluginFileValidateType, FilePondPluginFileValidateSize);

    // Get a reference to the file input element
    const inputGambar = document.querySelectorAll('input.upload_gambar');
    const inputFile = document.querySelectorAll('input.upload_file');

    Array.from(inputGambar).forEach(inputElement => {
        // Create the FilePond instance
        FilePond.create(inputElement, {
            allowFileSizeValidation: true,
            maxFileSize: "20MB",
            acceptedFileTypes: ['image/jpeg', 'image/png'],
            storeAsFile: true
        });
    });
   
    Array.from(inputFile).forEach(inputElement => {
        // Create the FilePond instance
        FilePond.create(inputElement, {
            allowFileSizeValidation: true,
            maxFileSize: "1MB",
            acceptedFileTypes: ['application/pdf'],
            allowPdfPreview: true,
            pdfPreviewHeight: 320,
            pdfComponentExtraParams: 'toolbar=0&view=fit&page=1' 
        });
    });
