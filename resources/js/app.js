import './bootstrap';
import './echo'


const addUserPresence = (user_info) => {

    return `
        <p id="presence-${user_info.id}" class="list-group-item list-group-item-action m-0">
            <img src="https://github.com/${user_info.github_username}.png" width="50" class="rounded mx-2" alt="">
            ${user_info.name}
        </p>
    `;
}

const newMessage = (user, message, timestamp) => {
    return `
        <p>
            <span>[${timestamp}]</span>
            <span>${user}:</span>
            <span>${message}</span>
        </p>
    `;
}


const presenceListEl = $("#presenceList");
const chatEl = $("#chatMessages");

$(document).ready(function () {
    const channelId = $("#channelId").val()
    const guildId = $("#guildId").val()
    const chatFormEl = $("#chatForm")
    const messageContentEl = $("#messageContent");
    const csrfToken = $("input[name='_token']").val();

    chatFormEl.submit(function (e) {
        e.preventDefault();
        let uri = `/guilds/${guildId}/channels/${channelId}/messages`;
        fetch(uri, {
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
            },
            method: "POST",
            redirect: "follow", // manual, *follow, error
            referrerPolicy: "no-referrer",
            body: JSON.stringify({_token: csrfToken, content: messageContentEl.val()})
        })
            .then(res => res.json())
            .then(res => console.log);
    })

    Echo.channel('room.' + channelId)
        .listen('.newMessage', function (event) {
            console.log('chegou msg caraio boa d+')
            console.log(event)
            chatEl.append(newMessage(event.name, event.content, event.sent_at))
        })

    Echo.join('room.' + channelId)
        .here((users) => {
            for (let user of users) {
                presenceListEl.append(addUserPresence(user))
            }
            //
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
})



