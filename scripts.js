window.onload = () => {
    let elementCalendrier = document.getElementById("calendrier")

    let xmlhttp = new XMLHttpRequest()

    xmlhttp.onreadystatechange = () => {
        if(xmlhttp.readyState == 4){
            if(xmlhttp.status == 200){
                let evenements = JSON.parse(xmlhttp.responseText)

                // On instancie le calendrier
                let calendrier = new FullCalendar.Calendar(elementCalendrier, {
                    // On appelle les composants
                    plugins: ['dayGrid','timeGrid','list','interaction'],
                    defaultView: 'timeGridWeek',
                    locale: 'fr',
                    header: {
                        left: 'prev,next today addEventButton',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,list'
                    },
                    customButtons: {
                    addEventButton: {
                    text: 'Event...',
                    click: function Redirection () {
                        document.location.href="/asset/event.html";
                        }
                     }
                    },
                    buttonText: {
                        today: 'Aujourd\'hui',
                        month: 'Mois',
                        week: 'Semaine',
                        list: 'Liste'
                    },
                    events: evenements,
                    nowIndicator: true,
                   /* editable: true,
                    eventDrop: (infos) => {
                        if(!confirm("Etes vous sûr.e de vouloir déplacer cet évènement")){
                            infos.revert();
                        }
                    },*/
                    eventResize: (infos) => {
                        console.log(infos.event.end)
                    }
                })

                calendrier.render()


            }
        }
    }

    xmlhttp.open('get', 'http://localhost/Full_Calendar/assets/connect.php', true)
    xmlhttp.send(null)

}
