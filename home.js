var mymap = L.map('mapid').setView([43.7844, -88.7879], 6);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoicmVzb25vbmNlIiwiYSI6ImNraXBnZWhrYjBjdnMycm8xZHE0OXlvanYifQ.FViyJ3XG8yZRfKKCy0NTbw'
}).addTo(mymap);

var shopSite1 = L.marker([43.81239396035397, -88.51151275546601]).addTo(mymap);
shopSite1.bindPopup("<b>Headquarters</b>");

var serviceArea = L.circle([43.81239396035397, -88.51151275546601], {
    color: 'red',
    fillOpacity: 0,
    radius: 144841
}).addTo(mymap);

var layerGroup = L.layerGroup().addTo(mymap);

let checkingNew = setInterval(getJobs(), 1000);

function getJobs() {
    fetch('employee-views/jobs.php').then(response => response.json()).then(function (data) {
        if (data.status === 'ok') {
            return getPhotos(data.jobs);
        }
    });
}

function getPhotos(jobs) {
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
            }
        });
    }
}
