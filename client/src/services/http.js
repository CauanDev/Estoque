import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'https:localhost:8000/api',
    headers: {
        'Content-type': 'application/json',
        'Authorization': '2qzU0ENAOtmP5yzun4UeIrWv9HvKMhDQMPs54n7mf6498bF7dp4KLaQW3r48pLnDwZkUTYetvzKsGcJ',
        // 'ngrok-skip-browser-warning': true,
    }
});

// Adicionando ou atualizando um cabeçalho
axiosInstance.defaults.headers['New-Header'] = 'HeaderValue';

// Exemplo de função para adicionar/atualizar cabeçalhos dinamicamente
export const setHeader = (key, value) => {
    axiosInstance.defaults.headers[key] = value;
};

// Exemplo de uso
setHeader('Custom-Header', 'CustomValue');

export default axiosInstance;
