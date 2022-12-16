// CSS
import './css/variables.css';
import './css/reset.css';
import './css/base.css';
import './css/header.css';
import './css/single-page.css';
import './css/map.css';

// Navigation Functionalities
import Navigation from './js/Navigation';
const navigation = new Navigation();

// LeafletMap
import LeafletMap from './js/Leaflet';
const leafletMap = new LeafletMap();

// Search Functionalities
import Search from './js/Search';
const search = new Search();
