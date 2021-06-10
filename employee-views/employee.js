var mymap = L.map('mapid').setView([43.7844, -88.7879], 6);
var layerGroup = L.layerGroup().addTo(mymap);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoicmVzb25vbmNlIiwiYSI6ImNraXBnZWhrYjBjdnMycm8xZHE0OXlvanYifQ.FViyJ3XG8yZRfKKCy0NTbw'
}).addTo(mymap);
let checkingNew = setInterval(getJobs(made_by), 1000);
const newJob = document.getElementById('jobForm');
const jobsDiv = document.getElementById("points");

newJob.addEventListener('submit', function (event) {
    event.preventDefault();
    var name = document.getElementById('name').value;
    var made_by = document.getElementById('made_by').value;
    var x_coord = document.getElementById('x_coord').value;
    var y_coord = document.getElementById('y_coord').value;
    insertJob(name, made_by, x_coord, y_coord);
    document.getElementById('name').value = '';
    document.getElementById('x_coord').value = 0;
    document.getElementById('y_coord').value = 0;
});


function insertJob(name, made_by, x_coord, y_coord) {
    fetch('jobs.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            name: name,
            made_by: made_by,
            x_coord: x_coord,
            y_coord: y_coord,
            delete: 0,
        })
    }).then(data => {

        getJobs(made_by);
    });
}

function getJobs(made_by) {
    var endpoint = `?id=${made_by}`;
    if (isAdmin == 1) {
        endpoint = '';
    }
    fetch(`jobs.php${endpoint}`).then(response => response.json()).then(function (data) {
        if (data.status === 'ok') {
            return getPhotos(data.jobs);
        }
    });
}

function getPhotos(jobs) {
    jobsDiv.innerHTML = '';
    layerGroup.clearLayers();
    for (const j of jobs) {
        fetch(`http://webdev.cs.uwosh.edu/students/lopeze37/project/photos.php?job=${j.id}`).then(response => response.json()).then(data => {
            if (data.status === 'ok') {
                var marker = L.marker([j.x_coord, j.y_coord]).addTo(layerGroup);
                var images = '';
                for (const photo of data.photos) {
                    images += `<img src=http://webdev.cs.uwosh.edu/students/lopeze37/uploads/${photo.name.replace(/\s/g, '%20')} class="img-fluid"> <br>`;
                }
                marker.bindPopup(`${images} ${j.name}`);

                var jobItem = document.createElement("li");
                jobItem.classList.add("list-group-item");
                jobItem.innerHTML = j.name;

                var deleteButton = document.createElement("input");
                deleteButton.value = "Delete";
                deleteButton.type = "button";
                deleteButton.classList.add("btn", "btn-light", "btn-outline-primary");
                deleteButton.onclick = function () {
                    deleteJob(j.id);
                }

                var fileUpload = document.createElement('FORM');
                fileUpload.method = 'POST';
                fileUpload.action = 'http://webdev.cs.uwosh.edu/students/lopeze37/project/photos.php';
                fileUpload.classList.add("form-group")
                var fileInput = document.createElement('input');
                fileInput.type = "file";
                fileInput.name = "fileFormName";
                fileInput.id = "fileFormName";
                fileInput.required = true;

                fileInput.classList.add("form-control-file");
                var fileSubmit = document.createElement('input');
                fileSubmit.type = "submit";
                fileSubmit.classList.add("btn", "bt-primary");
                fileInput.name = "submit";

                fileUpload.appendChild(fileInput);
                fileUpload.appendChild(fileSubmit);

                fileUpload.addEventListener("submit", function (event) {
                    event.preventDefault();
                    addPhoto(j.id, fileInput.files);
                    fileUpload.reset();
                })

                jobItem.appendChild(deleteButton);
                jobItem.appendChild(fileUpload);


                jobsDiv.appendChild(jobItem);
            }
        });
    }
}

function deleteJob(id) {
    fetch('jobs.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id: id,
            delete: 1
        })
    }).then(response => response.json()).then(data => {
        if (data.status === 'ok') {
            getJobs(made_by);
        }
    })
}

function addPhoto(id, files) {
    let formData = new FormData();
    formData.append("file", files[0]);
    formData.append('job', id);
    fetch('http://webdev.cs.uwosh.edu/students/lopeze37/project/photos.php', {
        method: 'POST',
        body: formData
    }).then(
        getJobs(made_by)
    );
}