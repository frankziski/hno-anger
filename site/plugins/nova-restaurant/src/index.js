import Menusection from './components/Menusection.vue';
import Tabcontent from './components/Tabcontent.vue';
import Tabs from './components/Tabs.vue';

import "./index.scss";

panel.plugin("fz/nova-restaurant", {
  blocks: {
    menusection: Menusection,
    tabs: Tabs,
    tabcontent: Tabcontent,
  },
});