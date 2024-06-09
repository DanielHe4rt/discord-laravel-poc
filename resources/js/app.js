import './bootstrap';
import './echo'


const addUserPresence = (user_info) => {
    const thumbnails = [
        'danielhe4rt',
        'patricksilva1',
        'otaaviio',
        'luisnadachi',
    ];

    const randomThumbnail = thumbnails[Math.floor(Math.random() * thumbnails.length)];

    return `
        <p id="presence-${user_info.id}" class="list-group-item list-group-item-action m-0">
            <img src="https://github.com/${randomThumbnail}.png" width="50" class="rounded mx-2" alt="">
            ${user_info.name}
        </p>
    `;
}

const newMessage = (user, message, timestamp) => {
    return `
        <p>
            <span>${timestamp}</span>
            <span>${user}:</span>
            <span>${message}</span>
        </p>
    `;
}


const presenceListEl = $("#presenceList");
const chatEl = $("#chatMessages");

$(document).ready(function () {
    const channelId = $("#channelId").val()

    Echo.join('room.' + channelId)
        .listen('newMessage', function (event) {
            console.log('chegou msg caraio boa d+')
            console.log(event)
        })
        .here((users) => {
            for(let user of users) {
                presenceListEl.append(addUserPresence(user))
            }
            chatEl.append(newMessage("admin", "user " + user.name + " joined", "00:00:00"))
        })
        .joining((user) => {
            presenceListEl.append(addUserPresence(user))
            chatEl.append(newMessage("admin", "user " + user.name + " joined", "00:00:00"))
            console.log(user.name);
        })
        .leaving((user) => {
            $("#presence-" + user.id).remove()
            chatEl.append(newMessage("admin", "user " + user.name + " left", "00:00:00"))
        })
        .error((error) => {
            console.error(error);
        });
        // .listen('funciona', (e) => {
        //     console.log(e);
        // });
})



