let videoVisible = false; 

function toggleVideo(personaje) {
  const videoContainer = document.getElementById(`${personaje}Video`);
  if (videoContainer) {
    let videoSrc = '';

    switch (personaje) {
      case 'billgates':
        videoSrc = '<iframe width="560" height="315" src="https://www.youtube.com/embed/rqsCEHvVTd0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        break;
      case 'stevejobs':
        videoSrc = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Hg4NP-GQ1W8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        break;
      case 'timbernerslee':
        videoSrc = '<iframe width="560" height="315" src="https://www.youtube.com/embed/qbwnvpBBWGY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        break;
      case 'dennisritchie':
        videoSrc = '<iframe width="560" height="315" src="https://www.youtube.com/embed/-BcbYia299A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        break;
      default:
        videoSrc = '';
        break;
    }

    if (videoSrc !== '') {
      if (!videoVisible) {
        videoContainer.innerHTML = videoSrc;
        videoVisible = true; 
      } else {
        videoContainer.innerHTML = ''; 
        videoVisible = false; 
      }
    } else {
      alert('Video no encontrado');
    }
  }
}
