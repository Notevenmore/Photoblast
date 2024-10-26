const templateImage = new Image();
const gap = 20
templateImage.src = templatefotosrc;
templateImage.onload = async function () {
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");
    canvas.width = templateImage.width;
    canvas.height = templateImage.height;

    // ukuran foto
    const photoWidth = width;
    const photoHeight = height;

    // Menggambar template foto ke canvas
    context.drawImage(templateImage, 0, 0);

    const loadImage = (src) => {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.src = src;
            img.onload = () => resolve(img);
            img.onerror = reject;
        });
    };

    // Menggambar foto-foto dari local storage ke dalam template foto
    try {
        for (let i = 0; i <= 2; i++) {
            const foto = await loadImage(photos[i]);
            context.drawImage(foto, x, y, photoWidth, photoHeight);
            y = y + photoHeight + margin;
        }
        // simpan file collage
        const dataUrl = canvas.toDataURL("image/jpeg");
        // Membuat objek window untuk mencetak canvas
        const printWindow = window.open("", "", 'height:50px,width:50px');
        printWindow.document.open();
        printWindow.document.write(`
                    <html>
                        <head>
                            <title>Cetak Kolase Foto</title>
                            <style>@media print {
                                @page {
                                    padding: 0;
                                    margin: 0;
                                    size: 4in 6in;
                                }
                                body {
                                    display: flex;
                                }
                                .photo-container {
                                    display: flex;
                                    flex-direction: row;
                                    align-items: center;
                                    justify-content: center;
                                    width: 100vw;
                                    height: 100vh;
                                }
                                .photo-container img {
                                    width: 48vw;
                                    height: 100vh;
                                    object-position: center;
                                }
                            }</style>
                        </head>
                        <body style="margin: 0; padding: 0; text-align: center;">
                            <div class="photo-container">
                                <img src="${dataUrl}" />
                                <img src="${dataUrl}" />
                            </div>
                        </body>
                    </html>
                `);
        printWindow.document.close();

        // Menunggu gambar selesai dimuat di jendela pencetakan sebelum mencetak
        printWindow.onload = function () {
            printWindow.print();
        };
        printWindow.onbeforeunload = function () {
            const data = new FormData();
            data.append("email", email);
            data.append("photo", dataUrl.split(',')[1]);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                url: "/send-mail",
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log("Response dari server : ", response);
                    window.location.href = "/finish";
                },
                error: function (xhr, status, error) {
                    console.error("Error : ", error);
                },
            });
        }
    } catch (e) {
        console.error("error loading image: ", error);
    }
};
