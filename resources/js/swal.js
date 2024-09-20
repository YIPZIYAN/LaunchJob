import Swal from 'sweetalert2';
function sweetalert2($image) {
    Swal.fire({
        title: "Congratulations!",
        text:"You have win an iphone",
        imageUrl: $image,
        width: 600,
        padding: "3em",
        color: "#716add",
        background: "#fff",
        backdrop: `rgba(0,0,0,0.5)`
    });
}

