import './bootstrap';
import './echo'


Echo.channel('room.9c3d7578-6b8a-406e-bcb7-d1a42cb4da9f')
    .listen('funciona', (e) => {
        console.log(e);
    });
