let count = 14
let pointBorderColor = []

while (count-- > 0)
    pointBorderColor.push('rgba(255,99,132,1)')

count = 15
let pointBackgroundColor = []

while (count-- > 0)
    pointBackgroundColor.push('rgba(255,99,132,1)')

let labels = [
    'Great Sword',
    'Sword & Shield',
    'Dual Blades',
    'Long Sword' ,
    'Hammer',
    'Hunting Horn',
    'Lance',
    'Gunlance',
    'Switch Axe',
    'Charge Blade' ,
    'Insect Glavie' ,
    'Bow' ,
    'Light Bowgun' ,
    'Heavy Bowgun',
    'Event'
]

let ctx = document.getElementById('myChart')
let myChart = new Chart(ctx, {
    type: 'radar',
    data: {
        labels,
        datasets: [
            {
                label: 'Amount of Weapons use',
                data: [
                    // TODO: Data here -> waiting on data from jsonData['runs_weapons_maps_monsters']
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                ],
                pointBorderColor,
                pointBackgroundColor,
            }
        ]
    },
    options: {
        layout: {
        }
    }
})
