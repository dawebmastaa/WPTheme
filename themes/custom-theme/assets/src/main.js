// @ts-nocheck
import React from 'react';
import domReady from '@wordpress/dom-ready';
import { createRoot } from 'react-dom/client';

import CoolButton from './components/CoolButton';
import './main.scss';

const App = () => {
	return (
		<div>
			<h1>Hello, from React!</h1>
			<CoolButton onClickValue="I have been pressed">Press me</CoolButton>
		</div>
	);
};

domReady(() => {
	const testElement = document.getElementById('test');
	if (testElement) {
		const root = createRoot(testElement);
		root.render(<App />);
	} else {
		console.error('Root element with id "test" not found');
	}
});
