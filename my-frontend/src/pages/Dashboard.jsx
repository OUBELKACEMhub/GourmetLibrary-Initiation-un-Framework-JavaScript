import React, { useEffect, useState } from 'react';
import api from '../services/api'; // Had l-fichie li m9adin fih axios.create

const Dashboard = () => {
    const [stats, setStats] = useState(null);
    const [degraded, setDegraded] = useState([]);

    useEffect(() => {
        // Njibou l-stats
        api.get('/admin/stats').then(res => setStats(res.data));
        
        // Njibou l-ktouba li m-khasrin
        api.get('/admin/degraded').then(res => setDegraded(res.data.books));
    }, []);

    return (
        <div className="p-8">
            <h1 className="text-2xl font-bold mb-6">Admin Panel</h1>
            
            {/* Display Stats */}
            {stats && (
                <div className="grid grid-cols-2 gap-4 mb-8">
                    <div className="bg-blue-100 p-4 rounded shadow">
                        <p>Total Books</p>
                        <h2 className="text-3xl font-bold">{stats.total_books}</h2>
                    </div>
                    <div className="bg-red-100 p-4 rounded shadow">
                        <p>Damaged Books</p>
                        <h2 className="text-3xl font-bold">{stats.damaged_books_count}</h2>
                    </div>
                </div>
            )}

            {/* Table dyal Degraded Books */}
            <h2 className="text-xl font-bold mb-4">Liste des livres dégradés</h2>
            <table className="w-full border-collapse border border-gray-300">
                <thead>
                    <tr className="bg-gray-200">
                        <th className="border p-2 text-left">Titre</th>
                        <th className="border p-2 text-left">Catégorie</th>
                    </tr>
                </thead>
                <tbody>
                    {degraded.map(book => (
                        <tr key={book.id}>
                            <td className="border p-2">{book.title}</td>
                            <td className="border p-2">{book.category?.name || 'N/A'}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default Dashboard;