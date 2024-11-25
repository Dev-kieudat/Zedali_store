### Clone Repository về máy
Để tải mã nguồn từ repository về máy tính, bạn sử dụng lệnh git clone.
1. Cách thực hiện:
Sao chép URL của repository từ GitHub/GitLab. Ví dụ:
```bash
    https://github.com/Dev-kieudat/Zedali_store.git
```
2. Mở terminal (hoặc Git Bash) và chạy lệnh:
```bash
    git clone https://github.com/Dev-kieudat/Zedali_store.git
```
### Sau khi hoàn thành, bạn sẽ thấy một thư mục mới cùng tên với repository chứa toàn bộ mã nguồn.
1. Điều hướng vào thư mục dự án
 1.1 Di chuyển vào thư mục vừa clone:
 ```bash
    cd Zeldali_store
 ```
### Chỉnh sửa mã nguồn
Mở file cần sửa bằng trình soạn thảo yêu thích (VSCode, Sublime Text, Notepad++, v.v.).
Thực hiện các thay đổi cần thiết trong mã nguồn.
###  Kiểm tra trạng thái thay đổi
Sau khi chỉnh sửa, kiểm tra trạng thái repository để xem những gì đã thay đổi:
```bash
    git status
```
### Thêm thay đổi vào staging
```bash
    git add .
```
### Tạo commit
```bash
    git commit -m "Mô tả thay đổi của bạn"
```
### Đẩy thay đổi lên repository
```bash
    git push origin main
```
Lưu ý: Nếu bạn làm việc trên nhánh khác (không phải main), thay main bằng tên nhánh của bạn.
# Ghi chú
Trước khi chỉnh sửa, hãy đảm bảo bạn đã kéo (pull) code mới nhất:
```bash
    git pull origin main
```