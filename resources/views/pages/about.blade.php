<div class="container">
    <h2>Cari Probabilitas Negara Berdasarkan Nama</h2>

    <input type="text" id="nameInput" placeholder="Masukkan nama">
    <button id="searchButton">Cari</button>

    <h3>Hasil:</h3>
    <pre id="result"></pre>
</div>

<script>
    function fetchNationality() {
        let name = $("#nameInput").val().trim();
        if (name === "") {
            alert("Masukkan nama terlebih dahulu!");
            return;
        }

        $.ajax({
            url: `https://api.nationalize.io/?name=${name}`,
            method: "GET",
            success: function(response) {
                let output = `Nama: ${response.name}\nJumlah Data: ${response.count}\n\nNegara:\n`;

                response.country.forEach(country => {
                    output += `- ${country.country_id}: ${Math.round(country.probability * 100)}%\n`;
                });

                $("#result").text(output);
            },
            error: function() {
                $("#result").text("Gagal mengambil data. Coba lagi nanti.");
            }
        });
    }

    $(document).ready(function() {
        $("#searchButton").click(fetchNationality);
    });
</script>