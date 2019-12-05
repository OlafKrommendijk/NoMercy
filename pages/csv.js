function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // naam van het bestand
    downloadLink.download = filename;

    // Maakt een link voor het bestand
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Tovert de link weg
    downloadLink.style.display = "none";

    // Zet de download link in de dom
    document.body.appendChild(downloadLink);

    // klikt op de download link
    downloadLink.click();
}

function exportTableToCSV(filename) {
    //selecteert de tabel
    var csv = [];
    var rows = document.querySelectorAll("table tr");

    //selecteert alle td en th en pushed ze naar csv toe.
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");

        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);

        csv.push(row.join(","));
    }

    // Download het CSV bestand
    downloadCSV(csv.join("\n"), filename);
}