<?php
   include_once "header.html";
?>
<html> 
     <head>
      <link rel="stylesheet" href="style.css">
      <style> 
      #bookList {
        color:black;
      }
      .button{
        width: 150px;
    height: 25px;
    margin-left: 10px;
    margin-top: 5px;
    border: none;
    color: black;            
    border-radius: 5px;
    background-color:gray;
      }
      </style>
    </head>
  
    <h1><center>Department of Zoology</center></h1>
        
  <div id="bookList"></div>
  

  <script>
    // Function to fetch XML data and render the book catalog
    function renderBookCatalog(xmlData) {
      const books = xmlData.getElementsByTagName("book");
      const bookListDiv = document.getElementById("bookList");

      for (let i = 0; i < books.length; i++) {
        const title = books[i].getElementsByTagName("title")[0].textContent;
        const chapter = books[i].getElementsByTagName("chapter")[0].textContent;
        const dept = books[i].getElementsByTagName("dept")[0].textContent;
        const publicationYear = books[i].getElementsByTagName("publicationYear")[0].textContent;
        const downloadLink = books[i].getElementsByTagName("downloadLink")[0].textContent;

        const bookDiv = document.createElement("div");
        bookDiv.innerHTML = `
        
          <h2><u>${title}</u></h2>
          <p><b>Author:</b>&nbsp ${chapter} <b>grnere:</b>&nbsp ${dept} <b>Author:</b> &nbsp${publicationYear}</p>
          <button class="button"><a href="${downloadLink}" download>Download</a></button><br><hr>
          
        `;

        bookListDiv.appendChild(bookDiv);
      }
    }

    // Function to fetch the XML data and call renderBookCatalog()
    function fetchBookData() {
      fetch("zoo.xml")
        .then((response) => response.text())
        .then((xmlString) => {
          const parser = new DOMParser();
          const xmlData = parser.parseFromString(xmlString, "text/xml");
          renderBookCatalog(xmlData);
        })
        .catch((error) => {
          console.error("Error fetching book data:", error);
        });
    }

    // Fetch book data when the page loads
    window.onload = fetchBookData;
  </script>
</body>
</html>
