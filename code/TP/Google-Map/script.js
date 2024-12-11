let map;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: 48.8566, lng: 2.3522 }, 
    zoom: 12,
  });

  const courseSelect = document.getElementById('courseSelect');

  
  courseSelect.addEventListener('change', () => {
    const selectedCourse = courseSelect.value;
    fetchCourseDataFromBackend(selectedCourse);
  });

  fetchCourseDataFromBackend(1);
}

function displayCourseOnMap(coursePoints) {
  if (!coursePoints || coursePoints.length === 0) return;

 
  const bounds = new google.maps.LatLngBounds();
  const pathCoordinates = [];

  coursePoints.forEach((point) => {
    const marker = new google.maps.Marker({
      position: { lat: point.lat, lng: point.lng },
      map: map,
      title: point.name,
    });

    bounds.extend({ lat: point.lat, lng: point.lng });
    pathCoordinates.push({ lat: point.lat, lng: point.lng });
  });

  const coursePath = new google.maps.Polyline({
    path: pathCoordinates,
    geodesic: true,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 2,
  });
  coursePath.setMap(map);

  map.fitBounds(bounds);
}

function fetchCourseDataFromBackend(courseId) {
  const url = `courses.php?id=${courseId}`;


  fetch(url)
    .then((response) => response.json())  
    .then((courseData) => {
      if (Array.isArray(courseData) && courseData.length > 0) {
        
        displayCourseOnMap(courseData);
      } else {
        console.error('No data found for the selected course.');
      }
    })
    .catch((error) => {
      console.error('Error fetching course data:', error);
    });
}
