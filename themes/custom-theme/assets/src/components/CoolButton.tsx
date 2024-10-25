import React, { useState } from 'react';

export default function CoolButton({
	children
}: {
	children: React.ReactNode;
}) {
	const [clickCount, setClickCount] = useState<number>(0);

	const handleClick = () => {
		setClickCount(clickCount + 1);
	};

	return (
		<button className="btn" onClick={() => handleClick()}>
			I have been clicked {clickCount} times.
		</button>
	);
}
