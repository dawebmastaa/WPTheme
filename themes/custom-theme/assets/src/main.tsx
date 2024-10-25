import { createRoot } from 'react-dom/client';
import domReady from '@wordpress/dom-ready';

import './main.scss';

import App from './components/App';

domReady(() => {
	const testElement = document.getElementById('test');
	if (testElement) {
		const root = createRoot(testElement);
		root.render(<App />);
	} else {
		console.error('Root element with id "test" not found');
	}
});
