<!-- searchbyid.blade.php -->

<html>
<head>
    <title>Search by ID</title>
    <style>
        .card {
            width: 300px;
            padding: 20px;
            margin: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .card-details {
            margin-top: 10px;
        }

        .card-label {
            font-weight: bold;
        }

        .card-value {
            margin-left: 5px;
        }
        .card-cont {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }
        .search-container{
          display: flex;
          justify-content: center;
          align-items: center;
          /* height: 100vh; */
        }
        .search-form {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .search-input {
            width: 200px;
            padding: 5px;
            margin-right: 10px;
        }

        .search-button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Search by ID</h1>

     <div class="search-container">
          <input id="search-input" class="search-input" type="text" placeholder="Enter ID">
          <button id="search-button" class="search-button">Search</button>
     </div>
     <div class="search-container">
          <input id="search-input-genre" class="search-input" type="text" placeholder="Enter Genre">
          <button id="search-button-genre" class="search-button">Search</button>
     </div>
     

     <div class="card-cont">
          <div class="card">
               @if ($book)
               <h2 class="card-title">{{ $book->title }}</h2>
               <div class="card-details">
                   <p><span class="card-label">Author:</span> <span class="card-value">{{ $book->author }}</span></p>
                   <p><span class="card-label">Publisher:</span> <span class="card-value">{{ $book->publisher }}</span></p>
                   <p><span class="card-label">Publication Date:</span> <span class="card-value">{{ $book->publication_date }}</span></p>
                   <p><span class="card-label">ISBN:</span> <span class="card-value">{{ $book->isbn }}</span></p>
                   <p><span class="card-label">Price:</span> <span class="card-value">{{ $book->price }}</span></p>
                   <p><span class="card-label">Genre:</span> <span class="card-value">{{ implode(', ', $book->genre) }}</span></p>
                   <p><span class="card-label">Quantity:</span> <span class="card-value">{{ $book->quantity }}</span></p>
               </div>
               @else
               <p>No book found with the provided ID.</p>
               @endif
           </div>

     </div>
     <script>
          const searchButton = document.getElementById('search-button');
          const searchInput = document.getElementById('search-input');

          const searchButtonGenre = document.getElementById('search-button-genre');
          const searchInputGenre = document.getElementById('search-input-genre');
  
          searchButton.addEventListener('click', () => {
              const bookId = searchInput.value;
              window.location.href = `/books/${bookId}`;
          });

          searchButtonGenre.addEventListener('click', () => {
              const genre = searchInputGenre.value;
              window.location.href = `/books/genre/${genre}`;
          });
      </script>

    
</body>
</html>
