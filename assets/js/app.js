require('bootstrap');

import draggable from 'vuedraggable';
import Vue from 'vue';

new Vue({
    el: '#app',

    data() {
        return {
            drag: false,
            myArray: [
                {
                    name: 'első',
                    src: '/images/cards/cthuloid-spawn-som.jpg'
                },
                {
                    name: 'második',
                    src: '/images/cards/shudde-mell-tgs.jpg'
                },
                {
                    name: 'harmadik',
                    src: '/images/cards/a-fortunate-accident-er.jpg'
                },
            ]
        };
    },

    components: {
        draggable
    }
});
