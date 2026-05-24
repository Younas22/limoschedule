/* LimoSchedule — Tailwind CSS custom config
   Must be loaded AFTER the Tailwind CDN script */
tailwind.config = {
    theme: {
        extend: {
            colors: {
                limo: { blue: '#3B82F6', black: '#0A0A0A' }
            },
            fontFamily: { inter: ['Inter', 'sans-serif'] }
        }
    }
};
