import React, { useEffect, useState } from 'react';
import api from '../services/api';

const AdminStats = () => {
    const [stats, setStats] = useState(null);

    useEffect(() => {
        api.get('/admin/stats').then(res => setStats(res.data));
    }, []);

    if (!stats) return <p>Chargement...</p>;

    return (
        <div className="stats-container">
            <div className="card">Total Livres: {stats.total_books}</div>
            <div className="card text-red">Livres Endommagés: {stats.damaged_books_count}</div>
        </div>
    );
};

export default AdminStats;