<style>
.upload-container {
    margin: 20px;
    text-align: center;
}

#fileGrid { 
    display: grid;
    gap: 10px;
    margin-top: 20px;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); /* Responsive grid layout */
}

.file-item {
    position: relative;
    width: 100%;
    aspect-ratio: 1; /* Keep items square */
    overflow: hidden;
    border-radius: 8px;
    opacity: 0;
    transform: scale(0.95);
    transition: opacity 0.4s ease, transform 0.4s ease;
}

.file-item.show {
    opacity: 1;
    transform: scale(1);
}

.file-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

.delete-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    background: rgba(255, 0, 0, 0.7);
    color: white;
    border: none;
    border-radius: 50%;
    font-size: 16px;
    padding: 0 5px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.delete-btn:hover {
    background: rgba(255, 0, 0, 0.9);
}

.progress {
    background: #f3f3f3;
    border-radius: 4px;
    height: 10px;
    margin: 10px 0;
    width: 100%;
    overflow: hidden;
}

.progress-bar {
    background-color: #4caf50;
    height: 100%;
    width: 0%;
    border-radius: 4px;
    transition: width 0.4s ease;
}

/* Media queries for responsiveness */
@media (max-width: 768px) {
    #fileGrid {
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    }
}

@media (max-width: 480px) {
    #fileGrid {
        grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
    }

    .delete-btn {
        font-size: 14px;
        top: 3px;
        right: 3px;
    }
}
</style>



 


  <div class="data-table">
  <div class="table-container">
  <h2> Display products </h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Product Id</th>
      <th>Product Name</th>
      <th>Product Desc</th>
      <th>Product Price</th>
      <th>Product Image</th>
      <th>Product Tags</th>
      <th>Product Updated</th>
      <th>Product Identify</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($params['products'] as $key => $products): ?>
    <tr>
      <td><?= $key + 1 ?></td>
<td><?= $products['productId'] ?></td>
<td><?= $products['productName'] ?></td>
<td><?= $products['productDesc'] ?></td>
<td><?= $products['productPrice'] ?></td>
<td><?= $products['productImage'] ?></td>
<td><?= $products['productTags'] ?></td>
<td><?= $products['productUpdated'] ?></td>
<td><?= $products['productIdentify'] ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</tbody>
</table>

<div class="upload-container">
    <input type="hidden" id="mediaIdentify" value="<?= $products['productIdentify'] ?>">
    <input type="hidden" id="mediaType" value="product">
    <input type="file" id="fileUpload" multiple>
    <button onclick="uploadFiles()">Upload</button>
    <div id="progressContainer"></div>
    <div id="fileGrid"></div>
</div>

<script>
    // Assume ROOT is defined globally in PHP
    const ROOT = "<?php echo ROOT; ?>";
    document.addEventListener('DOMContentLoaded', loadFiles);

    function uploadFiles() {
    const files = document.getElementById('fileUpload').files;
    const formData = new FormData();
    
    // Get mediaIdentify and mediaType values from the form
    const mediaIdentify = document.getElementById('mediaIdentify').value;
    const mediaType = document.getElementById('mediaType').value;
    
    // Append files and additional data
    for (let i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }
    formData.append('mediaIdentify', mediaIdentify);
    formData.append('mediaType', mediaType);

    fetch(`${ROOT}/upload/media`, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.some(file => file.status === 'success')) {
            loadFiles();
            document.getElementById('fileUpload').value = ""; // Clear selected files
        }
    })
    .catch(error => console.error("Error uploading files:", error));
}



function loadFiles() {
    const mediaIdentify = document.getElementById('mediaIdentify').value;

    // Set the URL with the mediaIdentify parameter if it's provided
    const url = `${ROOT}/load/media` + (mediaIdentify ? `?mediaIdentify=${mediaIdentify}` : '');

    fetch(url)
        .then(response => response.json())
        .then(files => {
            const fileGrid = document.getElementById('fileGrid');
            fileGrid.innerHTML = '';
            files.forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                fileItem.innerHTML = `
                    <span class="delete-btn" onclick="deleteFile(${file.mediaId})">&times;</span>
                    <img src="${ROOT}/public/assets/alpha-theme/img/uploads/${file.mediaFile}" alt="${file.mediaName}">
                `;
                fileGrid.appendChild(fileItem);

                // Add animation delay for smooth appearance
                setTimeout(() => fileItem.classList.add('show'), index * 100);
            });
        })
        .catch(error => console.error('Error loading files:', error));
}


function deleteFile(mediaId) {
    if (confirm("Are you sure you want to delete this file?")) {
        fetch(`${ROOT}/delete/media`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ mediaId: mediaId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                loadFiles();
            } else {
                alert("Failed to delete file.");
            }
        });
    }
}

</script>
