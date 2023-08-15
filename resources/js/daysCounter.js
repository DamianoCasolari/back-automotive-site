function calculateDaysPassed(targetDate) {
    const oneDayMilliseconds = 24 * 60 * 60 * 1000; // Milliseconds in one day

    const currentDate = new Date();
    const targetDateTime = new Date(targetDate);

    const timeDifference = currentDate - targetDateTime;
    const daysPassed = Math.floor(timeDifference / oneDayMilliseconds);

    return daysPassed;
}

